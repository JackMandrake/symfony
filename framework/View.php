<?php

namespace Framework;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Component\Templating\TemplateNameParser;

$filesystemLoader = new FilesystemLoader(__DIR__.'/template.tpl.php');

$templating = new PhpEngine(new TemplateNameParser(), $filesystemLoader);
$templating->set(new SlotsHelper());

echo $templating->render('hello.php', ['firstname' => 'Fabien']);



// Cette objet permet de "mettre en forme" des données qu'on lui fournis et renvoyer le resultat
class View
{

    /**
     * @var string the path to the template
     */
    private $path;

    // lorsque mon application va vouloir utiliser ce composant
    // elle va devoir préciser quel fichier contient les données à utiliser
    // Grâce a ce mechanisme on peut réutiliser la classe Model quelle que soit la struture de mon projet
    public function __construct($path)
    {
        $this->path = $path;
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
