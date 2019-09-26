<?php

namespace App\Repositories;

use App\Contracts\Repositories\PostRepository as Contract;
use App\Entities\Post;
use App\Exceptions\CreateEntityException;
use App\Exceptions\DeleteEntityException;
use App\Exceptions\EntityNotFoundException;
use App\Exceptions\UpdateEntityException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Collection;

class PostRepository
    extends JsonRepository
    implements Contract
{

    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    public function find(int $id): Post
    {
        try {
            return new Post(parent::find($id));
        } catch (ClientException $exception) {
            throw new EntityNotFoundException($this->getEntityName());
        }
    }

    public function all(): Collection
    {
        try {
            return parent::all()
                ->map(function ($rawPost) {
                    return new Post($rawPost);
                });
        } catch (ClientException $exception) {
            throw new EntityNotFoundException($this->getEntityName());
        }
    }

    public function delete(int $id): bool
    {
        try {
            return parent::delete($id);
        } catch (\Exception $exception) {
            throw new DeleteEntityException($this->getEntityName());
        }
    }

    public function update(int $id, $payload)
    {
        try {
            return new Post(array_merge($payload, parent::update($id, $payload)));
        } catch (\Exception $exception) {
            throw new UpdateEntityException($this->getEntityName());
        }
    }

    public function create(array $payload): Post
    {
        try {
            return new Post(array_merge($payload, parent::create($payload)));
        } catch (\Exception $exception) {
            throw new CreateEntityException($this->getEntityName());
        }
    }

    protected function getEntityName(): string
    {
        return 'posts';
    }
}
