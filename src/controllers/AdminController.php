<?php
// src/controllers/AdminController.php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MongoDB\Client;
use Firebase\JWT\JWT;

class AdminController
{
    private $client;
    private $jwtSecret;

    public function __construct(Client $client, string $jwtSecret)
    {
        $this->client = $client;
        $this->jwtSecret = $jwtSecret;
    }

    public function index(Request $request): Response
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

            if (!$user || $user['role'] !== 'admin') {
                return new Response('Unauthorized', 403);
            }

            return new Response(file_get_contents(__DIR__ . '/../public/admin.html'));
        } catch (\Exception $e) {
            return new Response('Unauthorized', 401);
        }
    }

    public function getUsers(Request $request): Response
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

            if (!$user || $user['role'] !== 'admin') {
                return new Response('Unauthorized', 403);
            }

            $users = $collection->find([], ['projection' => ['password' => 0]]);
            $usersArray = [];
            foreach ($users as $user) {
                $usersArray[] = [
                    'id' => (string)$user['_id'],
                    'username' => $user['username'],
                    'hash_rate' => $user['hash_rate'],
                    'earnings' => $user['earnings'],
                ];
            }

            return new Response(json_encode($usersArray), 200, ['Content-Type' => 'application/json']);
        } catch (\Exception $e) {
            return new Response('Unauthorized', 401);
        }
    }
}