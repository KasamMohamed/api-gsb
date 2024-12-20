<?php

use App\Http\Controllers\FraisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteurController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/visiteur/initpwds', [VisiteurController::class,"initPassword" ]);
Route::post('/visiteur/login', [VisiteurController::class, 'logIn']);
Route::get('/visiteur/logout', [VisiteurController::class, 'logOut'])->name('sécurisée');
Route::get('/visiteur/unauth', [VisiteurController::class, 'Unauthorized'])->name('login');
Route::get('frais/{idFrais}', [FraisController::class, 'listerFrais']);
Route::post('frais/ajout', [FraisController::class, 'ajouterFrais']);
Route::post('frais/modif', [FraisController::class, 'modifierFrais']);
Route::delete('frais/suppr', [FraisController::class, 'supprimerFrais']);
Route::get('frais/liste/{idVisiteur}', [FraisController::class, 'listerFrais']);
