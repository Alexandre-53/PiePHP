<?php
namespace Controller;

use \Core\Controller;
use \Core\ORM;
use \Core\Request;
use \Core\Router;

class UserController extends Controller
{

    // AFFICHAGE PAGE
    public function index()
    {
        $this->render("index");
    }

    // AFFICHAGE PAGE REGISTER USER
    public function register()
    {
        $this->render("register", ["message" => ""]);
    }

    //CREATION USER
    public function registerPost()
    {
        $message ="";
        if (strlen(Request::$body["password"]) < 6 && isset(Request::$body["password"])) {
            $message = "<div class='registerfail'>Votre mot de passe doit contenir 6 caractères minimum</div>";
        } else {
            // On verifie que l'email n'existe pas
            $statement =  ORM::find(
                "users",
                ["column" => "count(*)",
                "where" => [
                "email" => Request::$body["email"]
                ]]
            );
            $count = (int) $statement->fetchColumn();
            if ($count === 1) {
                $message = "<div class='registerfail'>Cette email existe déja !</div>";
            } else {
                // On crée le compte
                $statement =ORM::create(
                    "users",
                    ["email" => Request::$body["email"],
                 "password" => md5(Request::$body["password"]),
                 "nom" => Request::$body["nom"],
                 "prenom" => Request::$body["prenom"],
                 "anniversaire" => Request::$body["anniversaire"]]
                );
                $message = "<div class='registerok'>Bienvenue !</div>";
                header("Refresh: 3;URL=".BASE_URI."/login");
            }
        }
        $this->render("register", ["message" => $message]);
    }

    // AFFICHAGE PAGE USER
    public function login()
    {
        $this->render("login", ["message" => ""]);
    }

    // CONNEXION USER
    public function loginPost()
    {
        $message ="";

        if (strlen(Request::$body["password"]) < 6 && isset(Request::$body["password"])) {
            $message = "<div class='loginfail'>Votre mot de passe doit contenir 6 caractères minimum</div>";
        } else {
            // On verifie que l'identifiant existe
            $statement =  ORM::find(
                "users",
                [
                "where" => [
                "email" => Request::$body["email"],
                "password" => md5(Request::$body["password"])
                ]]
            );
            $user = $statement->fetch();
            //Si c'est bon on crée la session et on redirige sur index
            if ($user !== false) {
                header("Location: ".BASE_URI);
                $_SESSION["user_id"] = $user["id"];
            } else {
                $message = "<div class='loginfail'>Mot de passse inccorrecte</div>";
            }
        }
        $this->render("login", ["message" => $message]);
    }

    // deconnexion
    public function logout()
    {
        unset($_SESSION["user_id"]);
        header("Location: ".BASE_URI);
    }

    //Mise à jour du profil
    public function profil()
    {
        $message ="";
        $statement =  ORM::find(
            "users",
            ["column" => "count(*)",
        "where" => [
        "id" => $_SESSION["user_id"]]]
        );
        $this->render("profil", ["message" => $message]);
    }

    // EDITER COMPTE USER
    public function edit()
    {
        $message ="";
        $fields =  [];
        if (Request::$body["email"] !== "") {
            $fields["email"] = Request::$body["email"];
        }
        if (Request::$body["password"] !== "") {
            $fields["password"] = md5(Request::$body["password"]);
        }
        if (Request::$body["anniversaire"] !== "") {
            $fields["anniversaire"] = Request::$body["anniversaire"];
        }
        if (Request::$body["nom"] !== "") {
            $fields["nom"] = Request::$body["nom"];
        }
        if (Request::$body["prenom"] !== "") {
            $fields["prenom"] = Request::$body["prenom"];
        }
        $statement = ORM::update(
            "users",
            ["where" =>["id" => $_SESSION["user_id"]]],
            $fields
        );
        if ($statement === false) {
            $message = "<div class='editok'>Erreur de la mise à jour</div>";
        } else {
            $message = "<div class='editok'>Profil mis à jour avec succès</div>";
        }
        $statement = ORM::find("users", ["where" => ["id" => $_SESSION["user_id"]]]);
        Router::$scope["user"] = $statement->fetch();
        $this->render("profil", ["message" => $message]);
    }


    // SUPPRESSION COMTE USER
    public function delete()
    {
        if (isset(Request::$body["delete"])===true) {
            $statement = ORM::delete(
                "users",
                ["where" =>["id" => $_SESSION["user_id"]]]
            );
            $message="<div class='editok'>compte supprimer</div>";
            header("Refresh: 3;URL=".BASE_URI);
            unset($_SESSION["user_id"]);
            $this->render("profil", ["message" => $message]);
        }
    }
}
