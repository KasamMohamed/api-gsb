<?php

namespace App\Http\Controllers;

use App\dao\FraisService;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use App\Models\Frai;


class FraisController extends Controller
{
    public function listerFrais(){
        return response()->json(Frai::all());

    }

    public function ajouterFrais(Request $request){
        $fraisService = new FraisService();
        $Frais= new Frai();
        $Frais->id_etat=2;
        $Frais->anneemois = $request->json('anneemois');
        $Frais->id_visiteur = $request->json('id_visiteur');
        $Frais->nbjustificatifs = $request->json('nbjustificatifs');

        $frais=$fraisService->saveFrais($Frais)."Insertion réussi";

        return response()->json($frais);
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

    public function supprimerFrais(Request $request)
    {
        try {
            $fraisService = new FraisService();
            $id_frais = $request->json("id_frais");
            $fraisService->supprFrais($id_frais);
            return response()->json(['message' => 'Suppression réalisée', 'id_frais:' => $id_frais]);
        } catch (QueryException $e) {
            throw new Exception($e->getMessage());

        }

    }}
