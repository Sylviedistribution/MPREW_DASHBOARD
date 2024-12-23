<?php

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
    Route::get('/', 'index')->middleware('auth:sanctum'); // List one
    Route::get('/mensurations', 'getMensuration'); // List all clients
    Route::post('/', 'store');// Create a new client
    Route::get('{client}', 'edit'); // Get a specific client
    Route::post('/update', 'update')->middleware('auth:sanctum'); ; // Update a client
    Route::delete('{client}', 'delete'); // Delete a client
    Route::get('filter', 'filter'); // Filter clients
});



// Robes Routes
Route::prefix('robes')->controller(Robe::class)->group(function () {
    Route::get('/', 'index')->middleware('auth:sanctum');
    Route::post('/', 'store')->middleware('auth:sanctum');
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
    Route::get('/', 'index')->middleware('auth:sanctum');
    Route::post('/store', 'store')->middleware('auth:sanctum');
    Route::delete('{commande}', 'delete');
    Route::get('filter', 'filter');
    Route::get('{commande}/articles', 'articles');
    Route::put('articles/{article}', 'articleUpdate');
    Route::delete('articles/{article}', 'articleDelete');
});

// Paiements Routes
Route::prefix('paiements')->controller(Paiement::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/make', 'store')->middleware('auth:sanctum');
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
    Route::post('/register', [Auth::class, 'register']);
    Route::post('/login', [Auth::class, 'login']);
    Route::post('/logout', [Auth::class, 'logout'])->middleware('auth:sanctum');
});
