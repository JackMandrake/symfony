<?php

namespace App\src\Controller;

use App\src\Service\Model;
use App\src\Service\View;


class Controller
{

    private $view;
    private $model;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
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
