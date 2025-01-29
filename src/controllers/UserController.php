<?php
// src/controllers/UserController.php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MongoDB\Client;
use Firebase\JWT\JWT;

class UserController
{
    private $client;
    private $jwtSecret;

    public function __construct(Client $client, string $jwtSecret)
    {
        $this->client = $client;
        $this->jwtSecret = $jwtSecret;
    }

    public function dashboard(Request $request): Response
    {
        $token = $request->cookies->get('access_token_cookie');
        if (!$token) {
            return new Response('Unauthorized', 401);
        }

        try {
            $decoded = JWT::decode($token, $this->jwtSecret, ['HS256']);
            $userId = $decoded->id;

            $collection = $this->client->selectDatabase('crypto_mining')->selectCollection('users');
            $user = $collection->findOne(['_id' => new \MongoDB\BSON\ObjectId($userId)]);

            if (!$user) {
                return new Response('User not found', 404);
            }

            return new Response(file_get_contents(__DIR__ . '/../public/dashboard.html'));
        } catch (\Exception $e) {
            return new Response('Unauthorized', 401);
        }
    }
}