<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleVenteController;
use App\Http\Controllers\CategorieController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::apiResource('/addCategorie', CategorieController::class);
/* Partie Categorie */
Route::post('/addCategorie', [CategorieController::class,'addCategorie']);
Route::get('/listCategorie', [CategorieController::class,'index']);
Route::delete('/deleteCateg/{idLibelle}', [CategorieController::class,'deleteCateg']);
Route::put('/modifCateg/{idLibelle}', [CategorieController::class,'modifCateg']);
Route::get('/restoreCateg', [CategorieController::class,'restoreCateg']);

/* Partie Articles */

Route::post('articles/add',[ArticleController::class,'store']);
Route::get('articles/list',[ArticleController::class,'index']);
Route::put('articles/edit/{id_Article}',[ArticleController::class,'editArt']);
Route::delete('articles/delete/{id_Article}',[ArticleController::class,'deleteArt']);

/* Paertie Article_Vente */

Route::post('artVente/add',[ArticleVenteController::class,'store']);
Route::get('artVente/list',[ArticleVenteController::class,'index']);
Route::delete('artVente/del/{id_ArtVente}',[ArticleVenteController::class,'deleteArtVente']);
Route::put('artVente/edit/{id_ArtVente}',[ArticleVenteController::class,'editArtVente']);

