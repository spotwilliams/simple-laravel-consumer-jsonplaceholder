<?php

namespace App\Repositories;

use App\Contracts\Repositories\Repository;
use GuzzleHttp\Client;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

abstract class JsonRepository implements Repository
{
    private $client;

    private $host;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->host = config('repository.host');
    }

    protected abstract function getEntityName(): string;

    protected function find(int $id): array
    {
        $entity = $this->getEntityName();
        $response = $this->client->get("{$this->host}/{$entity}/{$id}");

        return json_decode($response->getBody()->getContents(), true);
    }

    public function all(): Collection
    {
        $entity = $this->getEntityName();
        $response = $this->client->get("{$this->host}/{$entity}");

        return json_decode($response->getBody()->getContents(), true);

    }

    public function paginate(): Paginator
    {
        $entity = $this->getEntityName();
        $response = $this->client->get("{$this->host}/{$entity}");
        $items = json_decode($response->getBody()->getContents(), true);

        return $paginator = new \Illuminate\Pagination\Paginator($items);
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function update(int $id, $payload)
    {
        // TODO: Implement update() method.
    }

    public function create($payload)
    {
        // TODO: Implement create() method.
    }
}
