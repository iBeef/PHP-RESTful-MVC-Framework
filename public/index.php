<?php

require_once '../app/bootstrap.php';

// Init Router class

$router = new Router();

// An example of setting the index route.
$router->get('/', function($response) {
    $response->loadController('home', 'index');
});

// Run the app
$router->run();