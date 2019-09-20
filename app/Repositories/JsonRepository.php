<?php

namespace App\Repositories;

use GuzzleHttp\Client;

abstract class JsonRepository
{
    private $client;

    private $host;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->host = config('repository.host');
    }

    protected abstract function getEntityName(): string;

    protected function create()
    {

    }

    protected function update()
    {

    }

    protected function delete()
    {

    }

    protected function filter()
    {

    }

    protected function find(int $id): array
    {
        $entity = $this->getEntityName();

        return $this->client->get("{$this->host}/{$entity}/{$id}");
    }


    protected function findWith()
    {

    }
}
