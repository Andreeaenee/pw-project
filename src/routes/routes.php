<?php
// routes/routes.php

use Slim\App;

return function (App $app) {
    // Include the RouteService
    require __DIR__ . '/../services/RouteService.php';

    // Setup route using the RouteService
   $app->get('/', 'RouteService:helloWorld');
   
   
   require __DIR__ . '/../services/CategoryRouteHandler.php';
   $app->get('/category/{category_id}', 'CategoryRouteHandler:getCategory');
};
