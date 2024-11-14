<?php

use App\Http\Controllers\ApiClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Routes pour les clients
Route::prefix('api/clients')->controller(ApiClientController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{client}', 'show');
    Route::put('/{client}', 'update');
    Route::delete('/{client}', 'destroy');
});

// Routes pour les artisans
Route::prefix('api/artisans')->controller(ArtisanController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{artisan}', 'show');
    Route::put('/{artisan}', 'update');
    Route::delete('/{artisan}', 'destroy');
});

// Routes pour les robes
Route::prefix('api/robes')->controller(RobeController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{robe}', 'show');
    Route::put('/{robe}', 'update');
    Route::delete('/{robe}', 'destroy');
});

// Routes pour les coupes
Route::prefix('api/coupes')->controller(CoupeController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{coupe}', 'show');
    Route::put('/{coupe}', 'update');
    Route::delete('/{coupe}', 'destroy');
});

// Routes pour les cols
Route::prefix('api/cols')->controller(ColController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{col}', 'show');
    Route::put('/{col}', 'update');
    Route::delete('/{col}', 'destroy');
});

// Routes pour les manches
Route::prefix('api/manches')->controller(MancheController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{manche}', 'show');
    Route::put('/{manche}', 'update');
    Route::delete('/{manche}', 'destroy');
});

// Routes pour les jupes
Route::prefix('api/jupes')->controller(JupeController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{jupe}', 'show');
    Route::put('/{jupe}', 'update');
    Route::delete('/{jupe}', 'destroy');
});

// Routes pour les commandes
Route::prefix('api/commandes')->controller(CommandeController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{commande}', 'show');
    Route::put('/{commande}', 'update');
    Route::delete('/{commande}', 'destroy');
});

// Routes pour les paiements
Route::prefix('api/paiements')->controller(PaiementController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{paiement}', 'show');
    Route::put('/{paiement}', 'update');
    Route::delete('/{paiement}', 'destroy');
});

// Routes pour les transactions
Route::prefix('api/transactions')->controller(TransactionController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{transaction}', 'show');
    Route::put('/{transaction}', 'update');
    Route::delete('/{transaction}', 'destroy');
});

// Routes pour les notifications
Route::prefix('api/notifications')->controller(NotificationController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{notification}', 'show');
    Route::put('/{notification}', 'update');
    Route::delete('/{notification}', 'destroy');
});

// Authentification
Route::prefix('api/auth')->controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});
