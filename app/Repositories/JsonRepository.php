<?php

namespace App\Repositories;

use App\Contracts\Repositories\Repository;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

abstract class JsonRepository
    implements Repository
{
    /** @var Client */
    private $client;
    private $host;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->host = config('repository.host');
    }

    protected abstract function getEntityName(): string;

    public function find(int $id)
    {
        $entity = $this->getEntityName();
        $url = "{$this->host}/{$entity}/{$id}";

        return $this->retrieve($url);
    }

    public function all(): Collection
    {
        $entity = $this->getEntityName();
        $url = "{$this->host}/{$entity}";

        return collect($this->retrieve($url));

    }

    public function delete(int $id): bool
    {
        $entity = $this->getEntityName();
        $url = "{$this->host}/{$entity}/{$id}";
        $this->client->delete($url);

        return true;
    }

    public function update(int $id, $payload)
    {
        $entity = $this->getEntityName();
        $url = "{$this->host}/{$entity}/{$id}";
        $response = $this->client->put($url, $payload);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function create(array $payload)
    {
        $entity = $this->getEntityName();
        $url = "{$this->host}/{$entity}";
        $response = $this->client->post($url, $payload);

        return json_decode($response->getBody()->getContents(), true);
    }

    protected function retrieve(string $url)
    {
        $response = json_decode($this->client->get($url)->getBody()->getContents(), true);

        return $response;
    }

    protected function getHost()
    {
        return $this->host;
    }
}
