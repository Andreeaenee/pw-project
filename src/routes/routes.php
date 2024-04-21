<?php
// routes/routes.php

use Slim\App;

return function (App $app) {
    require __DIR__ . '/../services/RouteService.php';
    require __DIR__ . '/../services/RecipeRouteHandlerByCategoryId.php'; // Import the RecipeRouteHandlerByCategoryId class

    // Setup route using the RouteService
    $app->get('/', 'RouteService:helloWorld');

    // Setup route for searching recipes by category
    $app->get('/recipes/byCategory/{categoryId}', 'RecipeRouteHandlerByCategoryId:getRecipesByCategoryId');
};
