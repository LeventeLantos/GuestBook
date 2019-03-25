<?php
$request = $_SERVER['REDIRECT_URL'];

switch ($request) {
    case '/' :
        require __DIR__ . '/view.php';
        break;
    case '' :
        require __DIR__ . '/view.php';
        break;
    case '/preview' :
        require __DIR__ . '/preview.php';
        break;
    case '/insert' :
        require __DIR__ . '/insert.php';
        break;
    default:
        require __DIR__ . '/404.php';
        break;
}
