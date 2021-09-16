<?php
namespace Controller;

use \Core\Controller;
use \Core\ORM;
use \Core\Request;
use \Core\Router;

class FilmController extends Controller
{
        
    //AFFICHAGE PAGE FILM
    public function film()
    {
        $this->render("film", ["message"=> ""]);
    }
   
    public function seekfilm()
    {
        if (isset(Request::$body["film"])) {
            $statement = ORM::seekfilmall("*","film","genre","genre.id_genre","film.id_genre","titre",Request::$body["film"]);
            $film = $statement->fetchAll();
        }
        $this->render("film", ["recherche" => $film]);
    }
}
