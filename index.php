<?php

require_once "vendor/autoload.php";


use Framework\FrontController;


// j'instancie un objet de type FrontController pour pouvoir appler les methodes qu'il contient
$frontController = new FrontController();
// on appel la methode permet de lancer le traitement de la requete
// cette methode va appeler en cascadetout les autre methodes qui permettent le traitement de la requete
// puis renvoi le resultat (du texte au format soit HTML soit JSON)
$response = $frontController->run();

// cette reponse (le contenu de $response) va etre renvoyé au server qui va la transmettre au cleitn (navigateur) via HTTP
echo $response;