<?php

namespace App\Http\Controllers;

use App\Models\ArticleVente;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ArticleVenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ArticleVente::paginate(3);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $qte = $request->qte;
        $artId = $request->article_id;

        $validator = $request->validate([
            "libelle" => "required|min:3",
            "qteStock" => "required",
            //   "valeurPromo"=>"required",
            "prixVente" => "required",
            "marge" => "required",
            "coutFabrique" => "required",
            //   "reference"=>"required",
        ]);

        $newArtVente = ArticleVente::create([
            "libelle" => $request->libelle,
            "qteStock" => $request->qteStock,
            "prixVente" => $request->prixVente,
            "marge" => $request->marge,
            "coutFabrique" => $request->coutFabrique,
            // "valeurPromo"=>$request->valeurPromo,
            // "reference"=>$request->reference,
            // 'ref' => $request->ref,
        ]);


        foreach ($request->article_id as $index => $value) {
            $qte = $request->qte[$index];
            $tableAssoc = $newArtVente->articles()->attach($value, ["qte" => $qte]);
        }

        return response()->json([
            'sucess' => true,
            'data' => $newArtVente,
            'message' => "Article Vente créé avec succés",
        ]);
    }
    public function deleteArtVente($idArtVente)
    {

        $delArtVente = ArticleVente::where('id', $idArtVente)->first();
        // return $delArtVente;

        if ($idArtVente) {
            // dd($idArtVente);
            $delArtVente->articles()->detach();
            $delArtVente->delete();
            $delArtVente->save();

            return response()->json([
                "success" => true,
                "data" => [],
                "message" => "Article Vente supprimé"
            ]);
        }

        return response()->json([
            "success" => true,
            "data" => [],
            "message" => "Article Vente déjà supprimé",
        ]);
    }

    public function editArtVente(Request $request ,$idArtVente)
    {
        $artVente = [
            "libelle"=>$request->libelle,
            "qteStock" => $request->qteStock,
            "prixVente" => $request->prixVente,
            "marge" => $request->marge,
            "coutFabrique" => $request->coutFabrique,
        ];
        $editArtVente=ArticleVente::find($idArtVente);

        if ($editArtVente) {

            $editArtVente->update($artVente);
            $editArtVente->save();

              
            return response()->json([
                "success"=>true,
                "data"=>$editArtVente,
                "message"=>"Article Vente modifié"
            ]);
        }
        else {
          
            return response()->json([
                "success"=>true,
                "data"=>[],
                "message"=>"Article Vente n'existe pas impossible de supprimer"
            ]);
        }
    }





    /**
     * Display the specified resource.
     */
    public function show(ArticleVente $articleVente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticleVente $articleVente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleVente $articleVente)
    {
        //
    }
}
