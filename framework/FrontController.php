<?php

namespace Framework;

use App\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontController 
{

    // on va "lancer" notre application :
    // 1-trouver la route demandée
    // 2-executer la methode du controlleur qui correspond a la route
    // 3-on renvoi le resultat (la reponse générée par mon application) 
    public function run(): Response
    {
        $page = $this->getPageFromUrl();
        return $this->dispatchRoute($page);
    }

    // on determine quelle page à été appelée
    private function getPageFromUrl()
    {
        // je crée l'objet request a partir des superglobales
        $request = Request::createFromGlobals();

        // $request->query contient un "sac de parametre" (un objet qui permet de facilement recupérer des parametre grace à leur nom)
        // on utilise la methode get de query pour recupérer un param grace a son nom
        // le premier parametre c'est le nom du param
        // le deuxieme paramtre (optionnel) c'est la valeur à retourner si jamais le parametre n'a pas été fourni, n'existe pas
        $page = $request->query->get("page", "home");

        // si jamais le parametre page existe MAIS ne contient rien 
        if ($page === '') {
            // alors on veut afficher la page 404
            $page = '404';
        }
    
        return $page;
    }

        
    // ici on appel le controlleur qui correspond à la page désirée
    // ci $page contient "contact"
    private function dispatchRoute($page): Response
    {
        // $functionName = "executeContact"
        $functionName = 'execute' . ucfirst($page);

        /*
        // on a plus de fonctions dans notre projet donc ca pète
        if (!function_exists($functionName)) {
            $functionName = 'execute404';
        }
        */

        $controller = new Controller();

        if(!method_exists($controller, $functionName)) {
            $functionName = 'execute404';
        }

        // return executeContact();
        // return call_user_func([$controller, $functionName]);
        return $controller->$functionName();
    }
}