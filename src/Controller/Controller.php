<?php

namespace App\Controller;

use Framework\Model;
use Framework\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * The application main controller
 * 
 * This class is the main controller, it contains all the routes for my application
 * 
 * @author Luc Hidalgo
 */
class Controller
{

    /** 
     * @var View This property contains the view
     */
    private $view;

    /** 
     * @var Model This property contains the model, allowing to access data 
     */
    private $model;
    
    /**
     * My class constructor
     */
    public function __construct()
    {
        // je souhaite utiliser le "composant" Model (ses fonctionnalité)
        // pour fonctionner le Model a besoin de savoir où chercher les data

        $this->model = new Model(__DIR__ . "/../../data/data.php");
        $this->view = new View(__DIR__ . "/../../template/template.tpl.php");
    }

    public function getView(): View
    {
        return $this->view;
    }

    public function setView(View $view) 
    {
        $this->view = $view;
    }

    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    
    /**
     * Description rapide de ma methode
     * 
     * une description plus longue
     * sur plusieurs lignes
     * 
     */
    public function executeHome(): Response
    {
        /**
         * This variable contains data for home page
         */
        $data = $this->model->getData('home');

        // je recupère le contenu grâce à la vue
        $content = $this->view->displayHtml($data);

        /*
        //METHODE 1
        // je crée une reponse 
        $response = new Response();
        // je met le contenu 
        $response->setContent($content);

        */

        /*
        // METHODE 2
        // On crée une réponseen  precisant directement le contenu, le code et les headers
        $response = new Response(
            $content,
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
        */

        //METHODE 3
        // on crée la réponse avec le contenu et on laisse les valeur par defaut pour le code et les headers
        $response = new Response($content);

        // j'ai fini de "préparer" la réponse : je la retourne
        return $response;
    }

    public function executeContact(): Response
    {
        $data = $this->model->getData('contact');

        $usersHtml = '<ul>';
        foreach ($data['users'] as $user => $email) {
            $usersHtml .= '<li>' . $user . ' : ' . $email . '</li>';
        }
        $usersHtml .= '</ul>';

        $data['content'] .= $usersHtml;

        // on crée du contenu
        $content = $this->view->displayHtml($data);
        // on crée la reponse remplie avec le contenu
        $response = new Response($content);
        // on renvoi la reponse
        return $response;
    }

    public function execute404(): Response
    {
        $data = $this->model->getData('404');

        // http_response_code(404);

        // on crée du contenu
        $content = $this->view->displayHtml($data);
        // on crée la reponse remplie avec le contenu
        $response = new Response($content);
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
        // on renvoi la reponse
        return $response;
    }

    public function executeApi(): Response
    {
        $data = $this->model->getData('contact');
        /*
        $content = $this->view->displayJson($data['users']);

        $response = new Response(
            $content,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
        */

        // le JsonResponse (enfant de la classe Response) permet d'envoyer du contenu JSON
        // le contenu est automatiquement encodé en JSON
        // le header "Content-type" est autoatiquement mis à "application/json"
        $response = new JsonResponse($data);

        return $response;
    }
}
