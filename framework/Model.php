<?php

namespace Framework;

class Model
{

    private $path;

    // lorsque mon application va vouloir utiliser ce composant
    // elle va devoir préciser quel fichier contient les données à utiliser
    // Grâce a ce mechanisme on peut réutiliser la classe Model quelle que soit la struture de mon projet
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getData($page)
    {
        // on récupére le fichier fourni dans le constructeur
        include $this->path;

        return $data[$page];
    }
}
