<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserRouteHandler
{
    public static function getUser(Request $request, Response $response, $args)
    {
        // Extract user ID from the route parameters
        $userId = $args['id'];

        // Fetch user from the database based on the ID
        // Example: Fetch user from database using $userId

        // Assuming $user contains the user data fetched from the database
        $user = [
            'id' => $userId,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            // Add other user properties here
        ];

        // Convert user data to JSON
        $jsonData = json_encode($user);

        // Set response headers
        $response = $response->withHeader('Content-Type', 'application/json');

        // Write JSON data to the response body
        $response->getBody()->write($jsonData);

        return $response;
    }
}

