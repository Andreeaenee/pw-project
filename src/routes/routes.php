<?php
// routes/routes.php

use Slim\App;

return function (App $app) {
    // Include the RouteService
    require __DIR__ . '/../services/RouteService.php';

    // Setup route using the RouteService
    $app->get('/', 'RouteService:helloWorld');
};
