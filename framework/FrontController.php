<?php

namespace Framework;

use App\Controller\Controller;

class FrontController 
{

    // on va "lancer" notre application :
    // 1-trouver la route demandée
    // 2-executer la methode du controlleur qui correspond a la route
    // 3-on renvoi le resultat (la reponse générée par mon application) 
    public function run() 
    {
        $page = $this->getPageFromUrl();
        return $this->dispatchRoute($page);
    }

    // on determine quelle page à été appelée
    private function getPageFromUrl()
    {
        if (isset($_GET['page'])) {
            $pageFound = $_GET['page'];
            if ($pageFound == '') {
                $pageFound = '404';
            }
        } else {
            $pageFound = 'home';
        }
    
        return $pageFound;
    }

        
    // ici on appel le controlleur qui correspond à la page désirée
    // ci $page contient "contact"
    private function dispatchRoute($page)
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