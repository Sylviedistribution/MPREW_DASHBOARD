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

class CommandeController extends Controller
{

    public function index()
    {
        $commandesList = Commandes::paginate(10);

        return view('commandes/list', compact('commandesList'));
    }

    public function artisanView()
    {
        $commandesList = Commandes::paginate(10);

        return view('commandes/artisanView', compact('commandesList'));
    }

    public function valider(Commandes $commandes)
    {
        $commandes->update(['artisanId' => auth('artisan')->id()]);

        return view('commandes/accepter');
    }

    public function create()
    {
        $clientsList = Clients::all();
        $coupesList = Coupes::all();
        $colsList = Cols::all();
        $manchesList = Manches::all();
        $jupesList = Jupes::all();
        $tissusList = Tissues::all();


        return view('commandes/create',compact('clientsList','coupesList','colsList','manchesList','jupesList','tissusList'));
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
                'prixUnitaire' => 40000,
                'commandeId' => $commande->id,
            ]);

            $total += $commandeArticle->quantite * $commandeArticle->prixUnitaire;
        }

        // Met à jour le total de la commande
        $commande->update(['total' => $total]);

        return redirect()->route('commandes.list')->with('success', 'Commande créée avec succès !');
    }

    public function delete(Commandes $commande)
    {
        $commande->delete();

        return redirect()->route('jupes.list')
            ->with('success', "La commande " . $commande->id . " a été supprimée avec succès.");
    }

    public function filter(Request $request)
    {
        $commandesList = Commandes::filterBy($request->dateDebut, $request->dateFin, $request->total, $request->statut, $request->email);

        return view('commandes.list', compact('commandesList'));
    }


    public function articles(Commandes $commande)
    {
        $articlesList = CommandeArticles::where('commandeId', 'like', '%' . $commande->id . '%')->paginate(10);

        return view('commandes/listArticles', compact('articlesList'));
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

    public function filterArticles(Request $request)
    {
        $articlesList = CommandeArticles::filterBy($request->quantite, $request->prixUnitaire);

        return view('commandes/listArticles', compact('articlesList'));
    }


}
