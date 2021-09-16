<?php
namespace Controller;

use \Core\Controller;
use \Core\ORM;
use \Core\Request;
use \Core\Router;

class MembreController extends Controller
{
    // AFFICHAGE PAGE
    public function index()
    {
        $this->render("index");
    }
        
    //AFFICHAGE PAGE MEMBRES
    public function membre()
    {
        $this->render("membre", ["message"=> ""]);
    }
        
    //RECHERCHE DE MEMBRES
    public function seekmembre()
    {
        if (isset(Request::$body["prenom"]) && isset(Request::$body["nom"])) {
            $statement = ORM::findmemberall("*","fiche_personne","prenom",Request::$body["prenom"],"nom",Request::$body["nom"]);
            $fiches_personne = $statement->fetchAll();
        }
        //PAR NOM
        elseif (isset(Request::$body["nom"])) {
            $statement = ORM::findmember("*","fiche_personne","nom",Request::$body["nom"]);
            $fiches_personne = $statement->fetchAll();
        }
        //PAR PRENOM
        elseif (isset(Request::$body["prenom"])) {
            $statement = ORM::findmember("*","fiche_personne","prenom",Request::$body["prenom"]);
            $fiches_personne = $statement->fetchAll();
        }
        $this->render("membre", ["message"=>$fiches_personne]);
    }
}
