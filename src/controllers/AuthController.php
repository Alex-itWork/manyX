<?php
// src/controllers/AuthController.php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MongoDB\Client;
use Firebase\JWT\JWT;

class AuthController
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
        return new Response(file_get_contents(__DIR__ . '/../public/index.html'));
    }

    public function register(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $username = $request->request->get('username');
            $password = $request->request->get('password');

            $collection = $this->client->selectDatabase('crypto_mining')->selectCollection('users');
            $existingUser = $collection->findOne(['username' => $username]);

            if ($existingUser) {
                return new Response('User already exists', 400);
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $collection->insertOne([
                'username' => $username,
                'password' => $hashedPassword,
                'hash_rate' => 0,
                'earnings' => 0,
            ]);

            return new Response('User registered', 201);
        }

        return new Response(file_get_contents(__DIR__ . '/../public/register.html'));
    }

    public function login(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $username = $request->request->get('username');
            $password = $request->request->get('password');

            $collection = $this->client->selectDatabase('crypto_mining')->selectCollection('users');
            $user = $collection->findOne(['username' => $username]);

            if (!$user || !password_verify($password, $user['password'])) {
                return new Response('Invalid credentials', 400);
            }

            $token = JWT::encode(['id' => (string)$user['_id']], $this->jwtSecret, 'HS256');
            $response = new Response(file_get_contents(__DIR__ . '/../public/dashboard.html'));
            $response->headers->setCookie(new \Symfony\Component\HttpFoundation\Cookie('access_token_cookie', $token, time() + 3600, '/', null, false, true));
            return $response;
        }

        return new Response(file_get_contents(__DIR__ . '/../public/login.html'));
    }

    public function logout(Request $request): Response
    {
        $response = new Response(file_get_contents(__DIR__ . '/../public/index.html'));
        $response->headers->clearCookie('access_token_cookie');
        return $response;
    }
}