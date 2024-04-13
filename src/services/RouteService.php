<?php
// services/RouteService.php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RouteService
{
    public static function helloWorld(Request $request, Response $response, $args)
    {
        // Ensure that we're using the Slim Response object
        $response->getBody()->write("Hello world");
        return $response;
    }
}
