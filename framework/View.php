<?php

namespace Framework;

// Cette objet permet de "mettre en forme" des données qu'on lui fournis et renvoyer le resultat
class View
{

    private $path;

    // lorsque mon application va vouloir utiliser ce composant
    // elle va devoir préciser quel fichier contient les données à utiliser
    // Grâce a ce mechanisme on peut réutiliser la classe Model quelle que soit la struture de mon projet
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function displayHtml($data)
    {
        ob_start();
        include $this->path;
        $html = ob_get_clean();

        return $html;
    }

    public function displayJson($data)
    {
        header('Content-Type: application/json');

        return json_encode($data);
    }
}
