<?php
// services/RouteService.php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require './database/receipes_queris.php';
class RouteService
{
    public static function helloWorld(Request $request, Response $response, $args)
    {
        // Ensure that we're using the Slim Response object
        $response->getBody()->write("Hello world_MWHAHAHAHHAHAHAH");
        return $response;
    }
}
