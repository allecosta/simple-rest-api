<?php

require __DIR__ . '/includes/bootstrap.php';

$uri = parse_url(($_SERVER['REQUEST_URI']), PHP_URL_PATH);
$uri = explode('/', $uri);

if ((isset($uri[2]) && $uri[2] != "user") || !isset($uri[3])) {
    header('HTTP/1.1 404 Not Found');
    exit();
}

require ROOT_PATH . '/Controllers/Api/UserController.php';

$objFeedController = new UserController();
$strMethodName = $uri[3] . "Action";
$objFeedController->{$strMethodName}();

