<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ArtikelController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RekomendasiController;
use App\Http\Controllers\Api\HistoriController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::get('/artikel', [ArtikelController::class, 'index']);      
    Route::post('/post-artikel', [ArtikelController::class, 'store']);    
    Route::get('/artikel/{id}', [ArtikelController::class, 'show']);    
    Route::get('/profile/{id_users}', [ProfileController::class, 'show']);    
    Route::get('/profile/{id_users}', [ProfileController::class, 'show']);    
    Route::post('/post_profile', [ProfileController::class, 'store']);    
    Route::get('/rekomendasi/{id}', [RekomendasiController::class, 'show']);    
    Route::post('/post-histori', [HistoriController::class, 'store']);    
});

