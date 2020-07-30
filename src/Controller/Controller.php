<?php

namespace App\Controller;

use Framework\Model;
use Framework\View;

class Controller
{

    private $view;
    private $model;

    public function __construct()
    {
        // je souhaite utiliser le "composant" Model (ses fonctionnalité)
        // pour fonctionner le Model a besoin de savoir où chercher les data
        $this->model = new Model(__DIR__ . "/../../data/data.php");
        $this->view = new View(__DIR__ . "/../../template/template.tpl.php");
    }


    // Route : url + Controller + Methode controleur
    // url : /
    // controleur : Controller
    // methode : executeHome
    public function executeHome()
    {
        $data = $this->model->getData('home');

        return $this->view->displayHtml($data);
    }

    public function executeContact()
    {
        $data = $this->model->getData('contact');

        $usersHtml = '<ul>';
        foreach ($data['users'] as $user => $email) {
            $usersHtml .= '<li>' . $user . ' : ' . $email . '</li>';
        }
        $usersHtml .= '</ul>';

        $data['content'] .= $usersHtml;

        return $this->view->displayHtml($data);
    }

    public function execute404()
    {
        $data = $this->model->getData('404');

        http_response_code(404);

        return $this->view->displayHtml($data);
    }

    public function executeApi()
    {
        $data = $this->model->getData('contact');

        return $this->view->displayJson($data['users']);
    }
}
