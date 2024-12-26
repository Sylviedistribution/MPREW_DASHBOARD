<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Cols;
use App\Models\CommandeArticles;
use App\Models\Commandes;
use App\Models\Coupes;
use App\Models\Jupes;
use App\Models\Manches;
use App\Models\Robes;
use App\Models\Tissues;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CommandeController extends Controller
{

    public function index()
    {
        $commandesList = Commandes::with('client')->paginate(10);

        return view('commandes/list', compact('commandesList'));
    }

    public function artisanView()
    {
        $commandesList = Commandes::where('statut', 'like', 'EN_ATTENTE')->paginate(10);

        return view('commandes/artisanView', compact('commandesList'));
    }

    public function valider(Commandes $commande)
    {

        // Récupérer l'ID de l'artisan authentifié
        $artisanId = auth('artisan')->id();

        $statut = "EN_PREPARATION";
        // Vérification : Artisan authentifié ?
        if (!$artisanId) {
            return back()->withErrors(['error' => "L'authentification artisan a échoué."]);
        }

        // Mettre à jour la commande
        $commande->update([
            'artisanId' => $artisanId,
            'statut' => $statut,
        ]);


        // Retourner la vue avec les commandes mises à jour
        return redirect()->route('commandes.accepter')->with('success', 'Commande validée avec succès.');
    }

    public function mesCommandes()
    {
        $artisanId = auth('artisan')->id();

        // Récupérer la liste des commandes de l'artisan
        $commandesList = Commandes::where('artisanId', $artisanId)->get();

        $statut = Commandes::getStatuts();

        // Tableau pour stocker les coordonnées de chaque commande
        $coordinates = [];

        // Parcourir les commandes pour obtenir les coordonnées
        foreach ($commandesList as $commande) {
            $adresse = $commande->client->adresse; // Récupérer l'adresse du client

            // Appeler l'API de géocodage pour obtenir les coordonnées
            $response = Http::get('https://api.distancematrix.ai/maps/api/geocode/json', [
                'address' => $adresse,
                'key' => 'PDEdeRW6YJORMRgcPMlmoNB7istj2kJLg2PGrEhGZGCjvdux8St5jJFvzRDS1CNh'
            ]);

            $data = $response->json();

            // Extraire la latitude et la longitude de la réponse
            $latitude = $data['results'][0]['geometry']['location']['lat'] ?? null;
            $longitude = $data['results'][0]['geometry']['location']['lng'] ?? null;

            // Ajouter les coordonnées à un tableau
            $coordinates[] = [
                'latitude' => $latitude,
                'longitude' => $longitude,
            ];
            return ($adresse);
        }

        // Passer les commandes et les coordonnées à la vue
        return view('commandes/mesCommandes', compact('commandesList', 'statut', 'coordinates'))->with('success', 'Commande validée avec succès.');
    }


    public function updateStatus(Request $request, Commandes $commande)
    {
        $request->validate([
            'statut' => 'required|string',
        ]);

        $commande->update(['statut' => $request->statut]);

        return redirect()->back()->with('success', 'Le statut de la commande a été mis à jour avec succès.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'clientId' => 'required|exists:clients,id',
            'robes' => 'required|array',
            'robes.*.coupe_id' => 'required|exists:coupes,id',
            'robes.*.col_id' => 'required|exists:cols,id',
            'robes.*.manche_id' => 'required|exists:manches,id',
            'robes.*.jupe_id' => 'required|exists:jupes,id',
            'robes.*.tissu_id' => 'required|exists:tissues,id',
            'robes.*.quantite' => 'required|integer|min:1',
        ]);

        // Créez la commande principale
        $commande = Commandes::create([
            'date' => Carbon::now(),
            'total' => 0, // Calculera plus tard
            'statut' => 'EN_ATTENTE',
            'clientId' => $request->clientId,
        ]);

        // Traitement des robes
        $total = 0;

        foreach ($request->robes as $robeData) {
            $robe = Robes::create([
                'date' => Carbon::now(),
                'colId' => $robeData['col_id'],
                'coupeId' => $robeData['coupe_id'],
                'mancheId' => $robeData['manche_id'],
                'jupeId' => $robeData['jupe_id'],
                'tissuId' => $robeData['tissu_id'],
                'clientId' => $request->clientId,
            ]);

            // Ajouter un article à la commande
            $commandeArticle = CommandeArticles::create([
                'robeId' => $robe->id,
                'quantite' => $robeData['quantite'],
                'prixUnitaire' => 100,
                'commandeId' => $commande->id,
            ]);

            $total += $commandeArticle->quantite * $commandeArticle->prixUnitaire;
        }

        // Met à jour le total de la commande
        $commande->update(['total' => $total]);

        return redirect()->route('commandes.list')->with('success', 'Commande créée avec succès !');
    }

    public function create()
    {
        $clientsList = Clients::all();
        $coupesList = Coupes::all();
        $colsList = Cols::all();
        $manchesList = Manches::all();
        $jupesList = Jupes::all();
        $tissusList = Tissues::all();


        return view('commandes/create', compact('clientsList', 'coupesList', 'colsList', 'manchesList', 'jupesList', 'tissusList'));
    }

    public function filter(Request $request)
    {
        $commandesList = Commandes::filterBy($request->dateDebut, $request->dateFin, $request->total, $request->statut, $request->email);

        return view('commandes.list', compact('commandesList'));
    }

    public function articles(Commandes $commande)
    {
        $articlesList = CommandeArticles::where('commandeId', 'like', '%' . $commande->id . '%')->with('robe') ->paginate(10);

        return view('commandes/listArticles', compact('articlesList'));
    }

    public function mensurations(CommandeArticles $article)
    {
        $mensurations = $article->commande->client->mensurations ?? null;
        // Décoder le JSON en un tableau associatif
        $dataArray = json_decode($mensurations, true);

        // Récupérer les clés
        $keys = array_keys($dataArray);

        // Récupérer les valeurs
        $values = array_values($dataArray);

        return view('commandes/mensurations', compact('keys','values'));
    }

    public function articleEdit(CommandeArticles $article)
    {
    }

    public function articleUpdate(CommandeArticles $article)
    {
    }

    public function articleDelete(CommandeArticles $article)
    {
        $article->delete();

        return redirect()->route('commandes.articles')
            ->with('success', "L'aricle avec l'ID " . $article->id . " a été supprimée avec succès.");
    }

    public function delete(Commandes $commande)
    {
        $commande->delete();

        return redirect()->route('jupes.list')
            ->with('success', "La commande " . $commande->id . " a été supprimée avec succès.");
    }

    public function filterArticles(Request $request)
    {
        $articlesList = CommandeArticles::filterBy($request->quantite, $request->prixUnitaire);

        return view('commandes/listArticles', compact('articlesList'));
    }


}
