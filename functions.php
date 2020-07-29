<?php

function getPageFromUrl()
{
    if (isset($_GET['page'])) {
        $pageFound = $_GET['page'];
        if ($pageFound == '') {
            $pageFound = '404';
        }
    } else {
        $pageFound = 'home';
    }

    return $pageFound;
}

function dispatchRoute($page)
{
    $functionName = 'execute' . ucfirst($page);

    if (!function_exists($functionName)) {
        $functionName = 'execute404';
    }

    return call_user_func($functionName);
}

function executeHome()
{
    $data = getData('home');
  
    return displayHtml($data);
}

function executeContact()
{
    $data = getData('contact');

    $usersHtml = '<ul>';
    foreach ($data['users'] as $user => $email) {
        $usersHtml .= '<li>' . $user . ' : ' . $email . '</li>';
    }
    $usersHtml .= '</ul>';
    
    $data['content'] .= $usersHtml;

    return displayHtml($data);
}

function execute404()
{
    $data = getData('404');

    http_response_code(404);

    return displayHtml($data);
}

function executeApi()
{
    $data = getData('contact');

    return displayJson($data['users']);
}

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

function getData($page)
{
    include 'data.php';

    return $data[$page];
}