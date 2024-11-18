<?php

use App\Http\Controllers\Api\Artisan;
use App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Api\Client;
use App\Http\Controllers\Api\Col;
use App\Http\Controllers\Api\Commande;
use App\Http\Controllers\Api\Coupe;
use App\Http\Controllers\Api\Jupe;
use App\Http\Controllers\Api\Livraison;
use App\Http\Controllers\Api\Manche;
use App\Http\Controllers\Api\Model3d;
use App\Http\Controllers\Api\Notification;
use App\Http\Controllers\Api\Paiement;
use App\Http\Controllers\Api\Robe;
use App\Http\Controllers\Api\Tissu;
use App\Http\Controllers\Api\Transaction;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the "api"
| middleware group. Build your API!
|
*/

// Clients Routes
Route::prefix('clients')->controller(Client::class)->group(function () {
    Route::get('/', 'index'); // List all clients
    Route::post('/', 'store'); // Create a new client
    Route::get('{client}', 'edit'); // Get a specific client
    Route::put('{client}', 'update'); // Update a client
    Route::delete('{client}', 'delete'); // Delete a client
    Route::get('filter', 'filter'); // Filter clients
});


// Model3d Routes
Route::prefix('model3d')->controller(Model3d::class)->group(function () {
    Route::get('/', 'show');
});


// Robes Routes
Route::prefix('robes')->controller(Robe::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::delete('{robe}', 'delete');
});

// Coupes Routes
Route::prefix('coupes')->controller(Coupe::class)->group(function () {
    Route::get('/', 'index');
});

// Cols Routes
Route::prefix('cols')->controller(Col::class)->group(function () {
    Route::get('/', 'index');
});

// Manches Routes
Route::prefix('manches')->controller(Manche::class)->group(function () {
    Route::get('/', 'index');

});

// Jupes Routes
Route::prefix('jupes')->controller(Jupe::class)->group(function () {
    Route::get('/', 'index');

});

// Tissus Routes
Route::prefix('tissus')->controller(Tissu::class)->group(function () {
    Route::get('/', 'index');

});

// Commandes Routes
Route::prefix('commandes')->controller(Commande::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::delete('{commande}', 'delete');
    Route::get('filter', 'filter');
    Route::get('{commande}/articles', 'articles');
    Route::put('articles/{article}', 'articleUpdate');
    Route::delete('articles/{article}', 'articleDelete');
    Route::get('articles/filter', 'filterArticles');
});

// Paiements Routes
Route::prefix('paiements')->controller(Paiement::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::put('{paiement}', 'update');
    Route::delete('{paiement}', 'delete');
    Route::get('filter', 'filter');
});

// Livraisons Routes
Route::prefix('livraisons')->controller(Livraison::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::put('{livraison}', 'update');
    Route::delete('{livraison}', 'delete');
    Route::get('filter', 'filter');
});

// Transactions Routes
Route::prefix('transactions')->controller(Transaction::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::put('{transaction}', 'update');
    Route::delete('{transaction}', 'delete');
    Route::get('filter', 'filter');
});

// Notifications Routes
Route::prefix('notifications')->controller(Notification::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::put('{notification}', 'update');
    Route::delete('{notification}', 'delete');
    Route::get('filter', 'filter');
});

//Authentification
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});
