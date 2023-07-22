<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;

use Illuminate\Http\Request;

class AdministrateurController extends Controller
{
    // Dans le ontroller o doit  creeer les methodes pour faire des actions
    public function authentifierAdministrateur()
    {
        return '<h1> Bonjour les Administrateurs !!!</h1>';
    }

    // créer une fonction qui inserer dans la base de donner un administrateur:
    public function insererAdministrateur()
    {
        $Administrateur = new Administrateur();
        $Administrateur ->nom ="Sohdjeukeu";
        $Administrateur ->prenom ="Merlin";
        $Administrateur ->email ="merlinsohd@yahoo.fr";
        $Administrateur -> save();

        return $Administrateur;
    }


}
