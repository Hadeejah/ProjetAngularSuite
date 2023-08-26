<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categorie::paginate(3);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }
    public function addCategorie(Request $request)
    {
        $validator = $request->validate([
            "libelle" => "required"
        ]);

        $lib = Categorie::where('libelle', $request->libelle)->first();
        if ($lib) {
            return response()->json(["message" => "libelle existe déjà", "data" => []]);
        }
        $newLib = Categorie::create(['libelle' => $request->libelle]);

        return response()->json(["message" => "Categorie créé avec succés", "data" => $newLib]);
    }

    public function modifCateg(Request $request, $idLib)
    {
        $lib = $request->libelle;

        $categLib = Categorie::find($idLib);

        if (!$categLib) {
            return response()->json(["message" => "Libelle n'existe pas impossible de modifier "]);
        }
        $categLib->libelle = $lib;
        $categLib->save();

        return response()->json(["message" => "Libelle modifié avec succés", "data" => $categLib]);

    }

    public function deleteCateg(Request $request, $idLib)
    {
        $delLib = Categorie::where('id', $idLib)->first();

        if ($delLib) {
            $delLib = Categorie::find($idLib);
            $delLib->delete();
            return response()->json(["message" => "Libelle supprimé"]);
        }
        return response()->json(["message" => "Libelle déjà supprimé"]);

    }

    public function restoreCateg(Request $request)
    {
        $ids = $request->id;

        $libRest = Categorie::withTrashed()->whereIn('id', $ids)->restore();
        return response()->json(["message" => "Libelle restauré"]);

    }


    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
}
