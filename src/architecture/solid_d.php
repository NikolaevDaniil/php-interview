<?php

interface HttpServiceInterface
{
    public function request(string $url, string $method, array $options = []): void;
}

class XMLHttpService implements HttpServiceInterface
{
    public function request(string $url, string $method, array $options = []): void
    {

    }
}

class Http
{
    private HttpServiceInterface $service;

    public function __construct(HttpServiceInterface $httpService)
    {
        $this->service = $httpService;
    }

    public function get(string $url, array $options): void
    {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url): void
    {
        $this->service->request($url, 'POST');
    }
}

