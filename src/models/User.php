<?php
// src/models/User.php
namespace App\Models;

use MongoDB\Client;

class User
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function findUserById(string $id)
    {
        $collection = $this->client->selectDatabase('crypto_mining')->selectCollection('users');
        return $collection->findOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);
    }

    public function updateUser(string $id, array $data)
    {
        $collection = $this->client->selectDatabase('crypto_mining')->selectCollection('users');
        $collection->updateOne(['_id' => new \MongoDB\BSON\ObjectId($id)], ['$set' => $data]);
    }
}