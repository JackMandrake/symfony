<?php

namespace App\src\Service;

// Cette objet permet de "mettre en forme" des données qu'on lui fournis et renvoyer le resultat
class View
{

    function displayHtml($data)
    {
        ob_start();
        include 'template.tpl.php';
        $html = ob_get_clean();

        return $html;
    }

    function displayJson($data)
    {
        header('Content-Type: application/json');

        return json_encode($data);
    }
}
