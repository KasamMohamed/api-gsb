<?php

namespace App\dao;

use App\Models\Frai;
use Doctrine\DBAL\Query\QueryException;

class FraisService
{
    public function getFraisById($idFrais){
        return Frai::join('etat', 'frais.id_etat', '=', 'etat.id_etat')
            ->select('frais.*', 'etat.lib_etat as etat')
            ->where('frais.id_frais', $idFrais)
            ->first();
    }

    public function createFrais(array $data)
    {
        $frais= new Frai();
        $frais->fill($data);
        $frais->save();

        return $frais;
    }

    public function saveFrais(Frai $frais)
    {
        $frais->save();
    }

    public function supprFrais(Request $request)
    {
        $id_frais= $request->json('id_frais');
        $res=Frai::destroy($id_frais);
        if(!$res) {
            return response()->json(['Suppression réalisée',]);
        }
        else {
            return response()->json(['Suppression non réalisée',]);
        }
    }

    public function getFraisByVisiteur($idVisiteur)
    {
        return Frai::where('id_visiteur', $idVisiteur)->get();
    }

}
