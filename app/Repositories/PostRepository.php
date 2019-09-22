<?php

namespace App\Repositories;

use App\Contracts\Repositories\PostRepository as Contract;
use App\Entities\Post;
use App\Exceptions\EntityNotFoundException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

class PostRepository extends JsonRepository
    implements Contract
{

    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    public function get(int $id): Post
    {
        try {
            return new Post(parent::find($id));
        } catch (ClientException $exception) {
            throw new EntityNotFoundException($this->getEntityName());
        }
    }

    public function all(): Collection
    {
    }

    public function paginate(): Paginator
    {
        // TODO: Implement paginate() method.
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

    protected function getEntityName(): string
    {
        return 'posts';
    }
}
