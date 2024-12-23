<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ColController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CoupeController;
use App\Http\Controllers\JupeController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\MancheController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\RobeController;
use App\Http\Controllers\TissuController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('#auth.connexion');
})->middleware('guest');

Route::get('index', function () {
    return view('index');
})->name('index')->middleware('admin');


Route::middleware('admin')->prefix('clients/')->controller(ClientController::class)->group(function () {
    Route::get('index', 'index')->name('clients.list');
    Route::get('create', 'create')->name('clients.create');
    Route::post('store', 'store')->name('clients.store');
    Route::get('edit/{client}', 'edit')->name('clients.edit');
    Route::post('update/{client}', 'update')->name('clients.update');
    Route::get('delete/{client}', 'delete')->name('clients.delete');
    Route::get('filter', 'filter')->name('clients.filter');
});

Route::middleware('admin')->prefix('artisans/')->controller(ArtisanController::class)->group(function () {
    Route::get('index', 'index')->name('artisans.list');
    Route::get('create', 'create')->name('artisans.create');
    Route::post('store', 'store')->name('artisans.store');
    Route::get('edit/{artisan}', 'edit')->name('artisans.edit');
    Route::post('update/{artisan}', 'update')->name('artisans.update');
    Route::get('delete/{artisan}', 'delete')->name('artisans.delete');
    Route::get('filter', 'filter')->name('artisans.filter');
});

Route::middleware('admin')->prefix('robes/')->controller(RobeController::class)->group(function () {
    Route::get('index', 'index')->name('robes.list');
    Route::get('create', 'create')->name('robes.create');
    Route::post('store', 'store')->name('robes.store');
    Route::get('edit/{robe}', 'edit')->name('robes.edit');
    Route::post('update/{robe}', 'update')->name('robes.update');
    Route::get('delete/{robe}', 'delete')->name('robes.delete');
    Route::get('filter', 'filter')->name('robes.filter');
});

Route::middleware('admin')->prefix('coupes/')->controller(CoupeController::class)->group(function () {
    Route::get('index', 'index')->name('coupes.list');
    Route::get('create', 'create')->name('coupes.create');
    Route::post('store', 'store')->name('coupes.store');
    Route::get('edit/{coupe}', 'edit')->name('coupes.edit');
    Route::post('update/{coupe}', 'update')->name('coupes.update');
    Route::get('delete/{coupe}', 'delete')->name('coupes.delete');
    Route::get('filter', 'filter')->name('coupes.filter');
});

Route::middleware('admin')->prefix('cols/')->controller(ColController::class)->group(function () {
    Route::get('index', 'index')->name('cols.list');
    Route::get('create', 'create')->name('cols.create');
    Route::post('store', 'store')->name('cols.store');
    Route::get('edit/{col}', 'edit')->name('cols.edit');
    Route::post('update/{col}', 'update')->name('cols.update');
    Route::get('delete/{col}', 'delete')->name('cols.delete');
    Route::get('filter', 'delete')->name('cols.filter');
});

Route::middleware('admin')->prefix('manches/')->controller(MancheController::class)->group(function () {
    Route::get('index', 'index')->name('manches.list');
    Route::get('create', 'create')->name('manches.create');
    Route::post('store', 'store')->name('manches.store');
    Route::get('edit/{manche}', 'edit')->name('manches.edit');
    Route::post('update/{manche}', 'update')->name('manches.update');
    Route::get('delete/{manche}', 'delete')->name('manches.delete');
    Route::get('filter', 'filter')->name('manches.filter');
});

Route::middleware('admin')->prefix('jupes/')->controller(JupeController::class)->group(function () {
    Route::get('index', 'index')->name('jupes.list');
    Route::get('create', 'create')->name('jupes.create');
    Route::post('store', 'store')->name('jupes.store');
    Route::get('edit/{jupe}', 'edit')->name('jupes.edit');
    Route::post('update/{jupe}', 'update')->name('jupes.update');
    Route::get('delete/{jupe}', 'delete')->name('jupes.delete');
    Route::get('filter', 'filter')->name('jupes.filter');
});

Route::middleware('admin')->prefix('tissus/')->controller(TissuController::class)->group(function () {
    Route::get('index', 'index')->name('tissus.list');
    Route::get('create', 'create')->name('tissus.create');
    Route::post('store', 'store')->name('tissus.store');
    Route::get('edit/{tissu}', 'edit')->name('tissus.edit');
    Route::post('update/{tissu}', 'update')->name('tissus.update');
    Route::get('delete/{tissu}', 'delete')->name('tissus.delete');
    Route::get('filter', 'filter')->name('tissus.filter');
});

Route::prefix('commandes/')->controller(CommandeController::class)->group(function () {
    Route::get('index', 'index')->name('commandes.list')->middleware('admin');
    Route::get('create', 'create')->name('commandes.create')->middleware('admin');
    Route::post('store', 'store')->name('commandes.store')->middleware('admin');
    Route::get('delete/{commande}', 'delete')->name('commandes.delete')->middleware('admin');
    Route::get('filter', 'filter')->name('commandes.filter');

    Route::get('valider/{commande}', 'valider')->name('commandes.valider');
    Route::get('artisanView', 'artisanView')->name('commandes.artisanView');
    Route::get('mesCommandes', 'mesCommandes')->name('commandes.accepter');

    Route::post('updateStatus/{commande}','updateStatus')->name('commandes.updateStatus');


    Route::get('articles/{commande}', 'articles')->name('commandes.articles');
    Route::get('mensurations/{article}', 'mensurations')->name('articles.mensurations');

    Route::get('articles/edit/{article}', 'articleEdit')->name('articles.edit')->middleware('admin');
    Route::post('articles/update/{article}', 'articleUpdate')->name('articles.update')->middleware('admin');
    Route::get('articles/delete/{article}', 'articleDelete')->name('articles.delete')->middleware('admin');
    Route::get('articles/filter', 'filterArticles')->name('articles.filter')->middleware('admin');


});

Route::middleware('admin')->prefix('paiements/')->controller(PaiementController::class)->group(function () {
    Route::get('index', 'index')->name('paiements.list');
    Route::get('create', 'create')->name('paiements.create');
    Route::post('store', 'store')->name('paiements.store');
    Route::get('edit/{paiement}', 'edit')->name('paiements.edit');
    Route::post('update/{paiement}', 'update')->name('paiements.update');
    Route::get('delete/{paiement}', 'delete')->name('paiements.delete');
    Route::get('filter', 'filter')->name('paiements.filter');
});

Route::prefix('livraisons/')->controller(LivraisonController::class)->group(function () {

    Route::post('store', 'store')->name('livraisons.store');
    Route::get('edit/{livraison}', 'edit')->name('livraisons.edit');
    Route::post('update/{livraison}', 'update')->name('livraisons.update');
    Route::get('delete/{livraison}', 'delete')->name('livraisons.delete');
    Route::get('filter', 'filter')->name('livraisons.filter');
});

Route::prefix('transactions/')->controller(TransactionController::class)->group(function () {
    Route::get('index', 'index')->name('transactions.list');
    Route::get('create', 'create')->name('transactions.create');
    Route::post('store', 'store')->name('transactions.store');
    Route::get('edit/{transaction}', 'edit')->name('transactions.edit');
    Route::post('update/{transaction}', 'update')->name('transactions.update');
    Route::get('delete/{transaction}', 'delete')->name('transactions.delete');
    Route::get('filter', 'filter')->name('transactions.filter');
    Route::get('mesTransactions', 'mesTransactions')->name('transactions.artisan');

});

// AUTHENTIFICATION
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/loginAction', 'loginAction')->name('login.action');
    Route::get('/logout', 'logout')->name('logout');
});


Route::get('/testYango', function () {
    return view('testYango');
});
