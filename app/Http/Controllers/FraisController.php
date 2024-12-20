<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frai;

class FraisController extends Controller
{
    public function listerFrais(){

    }

    public function ajouterFrais(Request $request){
        $fraisService = new FraisService();
        $frais= new Frai();
        $frais->id_etat=2;
        $frais->anneemois = $request->json('anneemois');
        $frais->id_visiteur = $request->json('id_visiteur');
        $frais->nbjustificatifs = $request->json('nbjustificatifs');
        $frais->$fraisService->saveFrais($frais)."Insertion réussi";

        return response()->json(['message' => 'Frais ajouté', 'frais' => $frais]);
    }

    public function modifierFrais(Request $request){
        $frais = new Frai();
        $frais->anneemois = $request->json('anneemois');
        $frais->id_visiteur = $request->json('id_visiteur');
        $frais->nbjustificatifs = $request->json('nbjustificatifs');
        $frais->montantvalide = $request->json('montantvalide');
        $frais->id_etat = $request->json('id_etat');

        $frais->save();

    }

    public function supprimerFrais(Request $request){

    }

}
