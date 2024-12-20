<?php

namespace App\dao;

class FraisService
{
    public function getFraisById($idFrais){
        return Frai::join('etat', 'frais.id_etat', '=', 'etat.id_etat')
            ->select('frais.*', 'etat.lib_etat as etat')
            ->where('frais.id_frais', $idFrais)
            ->first();
    }

}
