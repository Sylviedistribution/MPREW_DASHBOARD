<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CommandeArticles;
use App\Models\Commandes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Paiement extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'items' => 'required|array',
            'items.*.prix' => 'required|numeric|min:100',
            'items.*.quantite' => 'required|integer|min:1',
            'items.*.robeId' => 'required|integer|exists:robes,id',
            'currency' => 'nullable|string|max:3',
        ]);

        $client = auth('sanctum')->user();

        if (!$client) {
            return response()->json([
                'success' => false,
                'message' => 'Client non authentifié',
            ], 401);
        }

        $items = $request->input('items');

        function calculerTotal($items)
        {
            $total = 0;
            foreach ($items as $item) {
                $total += $item['prix'] * $item['quantite'];
            }
            return $total;
        }

        $total = calculerTotal($items);
        dd($total);
        $currency = $request->input('currency', 'XOF');
        $id = Str::uuid();

        // Requête à l'API PayTech
        try {
            $response = Http::withHeaders([
                'API_KEY' => env('PAYTECH_API_KEY'),
                'API_SECRET' => env('PAYTECH_API_SECRET'),
            ])->post('https://paytech.sn/api/payment/request-payment', [
                'item_name' => "Commande client",
                'item_price' => $total,
                'command_name' => "Paiement via PayTech",
                'currency' => $currency,
                'custom_field' => json_encode([
                    'item_id' => $id,
                    'time_command' => time(),
                    'ip_user' => $request->ip(),
                    'lang' => $request->header('Accept-Language'),
                ]),
                'env' => 'test',
                'ipn_url' => "https://domaine.com/ipn",
                'success_url' => "https://paytech.sn/mobile/success",
                'cancel_url' => "https://paytech.sn/mobile/cancel",
                'ref_command' => $id,
            ]);
        } catch (\Exception $e) {
            Log::error('Erreur PayTech', ['message' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Erreur de connexion avec PayTech.',
            ], 500);
        }

        if ($response->successful()) {
            $paymentUrl = $response->json('redirect_url');
            if (!$paymentUrl) {
                return response()->json([
                    'success' => false,
                    'message' => 'URL de paiement non générée.',
                ], 500);
            }

            // Création de la commande
            $commande = Commandes::create([
                'date' => Carbon::now(),
                'total' => $total,
                'statut' => 'EN_ATTENTE',
                'clientId' => $client->id,
            ]);

            foreach ($items as $item){
                $commandeArticle = CommandeArticles::create([
                    'robeId' => $item['robeId'],
                    'quantite' => $item['quantite'],
                    'prixUnitaire' => 40000,
                    'commandeId' => $commande->id,
                ]);
            }

            return response()->json([
                'payment_url' => $response->json('redirect_url'),
            ]);
        }
        else {
            // Erreurs lors de la requête
            $statusCode = $response->status();
            $responseBody = $response->json();

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la génération du paiement.',
                'status_code' => $statusCode,
                'response_body' => $responseBody,
            ], 500);
        }
    }

}
