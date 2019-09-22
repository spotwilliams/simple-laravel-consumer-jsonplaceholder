<?php

namespace App\Entities;

use App\Contracts\Entities\Entity;
use Illuminate\Support\Collection;

class Post implements Entity
{
    use MakeableEntity;

    /** @var int */
    private $id;
    /** @var string */
    private $title;
    /** @var string */
    private $body;
    /** @var string */
    private $userId;
    /** @var Collection */
    private $comments;

    public function __construct(array $rawPost)
    {
        $this->make($rawPost);
        $this->comments = new Collection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    public function addComment(Comment $comment)
    {
        $this->comments->add($comment);
    }

    /**
     * @return Collection
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }
}
