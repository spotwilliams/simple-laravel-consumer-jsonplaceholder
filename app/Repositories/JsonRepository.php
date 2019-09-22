<?php

namespace App\Repositories;

use App\Contracts\Repositories\Repository;
use GuzzleHttp\Client;
use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;

abstract class JsonRepository implements Repository
{
    /** @var Client  */
    private $client;
    private $host;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->host = config('repository.host');
        $this->host = config('repository.host');
    }

    protected abstract function getEntityName(): string;

    public function find(int $id)
    {
        $entity = $this->getEntityName();
        $url = "{$this->host}/{$entity}/{$id}";

        return $this->retrieve($url);
    }

    public function findWith(int $id, string $relation)
    {
        $entity = $this->getEntityName();
        $url = "{$this->host}/{$entity}/{$id}/{$relation}";

        return $this->retrieve($url);
    }

    public function all(): Collection
    {
        $entity = $this->getEntityName();
        $url = "{$this->host}/{$entity}";

        return collect($this->retrieve($url));

    }

    public function paginate(): Paginator
    {
        $entity = $this->getEntityName();
        $url = "{$this->host}/{$entity}";

        return new \Illuminate\Pagination\Paginator($this->retrieve($url));
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

    private function retrieve(string $url)
    {
        if (Cache::has($url)) {
            return Cache::get($url);
        }
        $response = json_decode($this->client->get($url)->getBody()->getContents(), true);
        Cache::put($url, $response);

        return $response;
    }
}
