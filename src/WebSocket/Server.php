<?php
// src/WebSocket/Server.php
namespace App\WebSocket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use MongoDB\Client;
use App\Models\User;

class Server implements MessageComponentInterface
{
    protected $clients;

    private $client;
    private $userModel;

    public function __construct(Client $client)
    {
        $this->clients = new \SplObjectStorage;
        $this->client = $client;
        $this->userModel = new User($client);
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg, true);

        if ($data['type'] === 'start-mining') {
            $userId = $data['userId'];
            $user = $this->userModel->findUserById($userId);

            if (!$user) {
                return;
            }

            // Simulate mining
            $hashRate = 100; // Simulated hash rate
            $user['hash_rate'] += $hashRate;
            $user['earnings'] += $hashRate * 0.0001; // Simulated earnings
            $this->userModel->updateUser($userId, $user);

            $response = [
                'type' => 'update-user',
                'user' => [
                    'id' => (string)$user['_id'],
                    'username' => $user['username'],
                    'hash_rate' => $user['hash_rate'],
                    'earnings' => $user['earnings'],
                ],
            ];

            foreach ($this->clients as $client) {
                if ($from !== $client) {
                    $client->send(json_encode($response));
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}