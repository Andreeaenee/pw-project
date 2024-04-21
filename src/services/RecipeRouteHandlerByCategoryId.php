<?php
// RecipeRouteHandler.php

namespace App\Handlers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RecipeRouteHandler
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getRecipesByCategoryId(Request $request, Response $response, $args)
    {
        try {
            // Extract categoryId from the route parameters
            $categoryId = $args['categoryId'];

            // Query database to retrieve recipes by category ID
            $statement = $this->pdo->prepare("SELECT * FROM recipes WHERE category_id = :categoryId");
            $statement->execute(['categoryId' => $categoryId]);
            $recipes = $statement->fetchAll(\PDO::FETCH_ASSOC);

            // Return the recipes as JSON
            return $response->withJson($recipes);
        } catch (\PDOException $e) {
            // Handle database errors
            return $response->withStatus(500)->write("Database error: " . $e->getMessage());
        }
    }
}
