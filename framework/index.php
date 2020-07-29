<?php

require_once '../vendor/autoload.php';

use App\src\Controller\Controller;
use App\src\FrontController;
use App\src\Service\Model;
use App\src\Service\View;

// j'instancie un objet de type FrontController pour pouvoir appeler les méthodes qu'il contient
$frontController = new FrontController();
// on appel la méthode qui permet de lancer le traitement de la requete
// cette méthode va appeler en cascade toutes les autres méthode qui permettent le traitement de la requete
// puis renvoie le résultat (du texte au format soit HTML soit JSON)
$response = $frontController->run();

// cette réponse ( le contenu de $response ) va être renvoyé au serveur qui va la transmettre au client (navigateur) via HTTP
echo $response;