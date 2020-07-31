<?php

namespace Framework;

use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Component\Templating\TemplateNameParser;


// Cette objet permet de "mettre en forme" des données qu'on lui fournis et renvoyer le resultat
class View
{

    /**
     * @var PhpEngine the php template engine
     */
    private $templating;

    // lorsque mon application va vouloir utiliser ce composant
    // elle va devoir préciser quel fichier contient les données à utiliser
    // Grâce a ce mechanisme on peut réutiliser la classe Model quelle que soit la struture de mon projet
    public function __construct($path)
    {        
        // $path = "/www/spe/e01/monrepo/template/"
        // FilesystemLoader = "/www/spe/e01/monrepo/template/%name%"

        // SI on lui demande d'utiliser la template qui s'appel 'homepage.tpl.php'
        // ALORS le moteur de template va chercher la template qui se situe a 
        // /www/spe/e01/monrepo/template/homepage.tpl.php
        $filesystemLoader = new FilesystemLoader($path . '%name%');
        $this->templating = new PhpEngine(new TemplateNameParser(), $filesystemLoader);
        $this->templating->set(new SlotsHelper());
    }


    /**
     * This fonction transform the data into html string
     * 
     * This function use the template to transform data to HTML
     *
     * @param array $data contains the data to add into the template
     * 
     * @return string the HTML generated with the template
     */
    public function displayHtml(array $data): string
    {

        // ce morceau de code là n'est plus utile , on prefere utiliser le moteur de template de symfony
        /*
        ob_start();
        include $this->path;
        $html = ob_get_clean();
        */

        $html = $this->templating->render('template.tpl.php', $data);

        return $html;
    }


}
