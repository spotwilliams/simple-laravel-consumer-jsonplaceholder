<?php

namespace App\Repositories;

use App\Contracts\Repositories\CommentRepository as Contract;
use App\Entities\Comment;
use App\Entities\Post;
use App\Exceptions\CreateEntityException;
use App\Exceptions\DeleteEntityException;
use App\Exceptions\EntityNotFoundException;
use App\Exceptions\UpdateEntityException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Collection;

class CommentRepository
    extends JsonRepository
    implements Contract
{
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    public function byPost(Post $post): Collection
    {
        $entity = $this->getEntityName();
        $url = "{$this->getHost()}/{$entity}?postId={$post->getId()}";

        return collect($this->retrieve($url))
            ->map(function ($rawPost) {
                return new Comment($rawPost);
            });
    }

    public function find(int $id)
    {
        try {
            return new Comment(parent::find($id));
        } catch (ClientException $exception) {
            throw new EntityNotFoundException($this->getEntityName());
        }
    }

    public function all(): Collection
    {
        try {
            return parent::all()
                ->map(function ($rawPost) {
                    return new Comment($rawPost);
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
            return new Comment(array_merge($payload, parent::update($id, $payload)));
        } catch (\Exception $exception) {
            throw new UpdateEntityException($this->getEntityName());
        }
    }

    public function create(array $payload)
    {
        try {
            return new Comment(array_merge($payload, parent::create($payload)));
        } catch (\Exception $exception) {
            throw new CreateEntityException($this->getEntityName());
        }
    }

    protected function getEntityName(): string
    {
        return 'comments';
    }
}
