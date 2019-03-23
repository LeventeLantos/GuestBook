<?php
$request = $_SERVER['REDIRECT_URL'];

switch ($request) {
    case '/' :
        require __DIR__ . '/index.php';
        break;
    case '' :
        require __DIR__ . '/index.php';
        break;
    case '/preview' :
        require __DIR__ . '/preview.php';
        break;
    default:
        require __DIR__ . '/404.php';
        break;
}
