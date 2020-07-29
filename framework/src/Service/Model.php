<?php

namespace App\src\Service;


class Model
{

    public function getData($page)
    {
        include __DIR__ . '/../../data/data.php';

        return $data[$page];
    }
}
