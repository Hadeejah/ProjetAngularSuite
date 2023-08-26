<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Appro;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => ArticleResource::collection(Article::paginate(3)),
            'message' => "Voici la liste des articles "
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $four = $request->fournisseur;

        $validator = $request->validate([
            "libelle" => "required",
            "categorie_id" => "required",
            "prix" => "required",
            "stock" => "required",

        ]);

        $newArt = Article::create([
            'libelle' => $request->libelle,
            'categorie_id' => $request->categorie_id,
            'stock' => $request->stock,
            'prix' => $request->prix,
            // 'ref' => $request->ref,
        ]);
        $newArtResour = new ArticleResource($newArt);
        $appro = Appro::create([
            'fournisseur_id' => $four,
            'article_id' => $newArt->id
        ]);

        return response()->json([
            'sucess' => true,
            'data' => $newArtResour,
            'message' => "Article créé avec succés",
        ]);
    }

    public function editArt(Request $request, $idArt)
    {
        $article = [
            "libelle" => $request->libelle,
            "categorie_id" => $request->categorie_id,
            "stock" => $request->stock,
            "prix" => $request->prix,

        ];
        $modifArt = Article::find($idArt);
        if (!$modifArt) {
            return response()->json(["message" => "Article n'existe pas impossible de modifier "]);
        }
        // dd($article);
        $modifArt->update($article);
        $modifArt->save();

        return response()->json([
            "success" => true,
            "data" => $modifArt,
            "message" => "Article modifié avec succés"
        ]);
    }

    public function deleteArt(Request $request, $idArt)
    {

        $delArt = Article::where('id', $idArt)->first();
        if ($delArt) {
            // dd($delArt);
            // $delArt=Article::find($idArt);
            $delArt->delete();
            $delArt->save();
            return response()->json([
                "success" =>true,
                "message" => "Libelle supprimé",
                "data"=>[]

            ]);
        }
        return response()->json([
            "message" => "Libelle déjà supprimé"
        ]);
    }





    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
