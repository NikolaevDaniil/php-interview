<?php

interface SecretKeyStorageInterface
{
    public function getSecretKey(): string;
}

class FileStorage implements SecretKeyStorageInterface
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function getSecretKey(): string
    {
        return 'Labean';
    }
}

class DB implements SecretKeyStorageInterface
{
    private $connection;

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    public function getSecretKey(): string
    {
        return 'Labean';
    }
}

class Redis implements SecretKeyStorageInterface
{
    private $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    public function getSecretKey(): string
    {
        return 'Labean';
    }
}

class Concept
{
    private \GuzzleHttp\Client $client;
    private SecretKeyStorageInterface $secretKeyStorage;

    public function __construct(SecretKeyStorageInterface $secretKeyStorage)
    {
        $this->client = new \GuzzleHttp\Client();
        $this->secretKeyStorage = $secretKeyStorage;
    }

    public function getUserData()
    {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->secretKeyStorage->getSecretKey()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }
}
