<?php

include 'functions.php';

$page = getPageFromUrl();

$response = dispatchRoute($page);

echo $response;