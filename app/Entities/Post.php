<?php

namespace App\Entities;

use App\Contracts\Entities\Entity;

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

    public function __construct(array $rawPost)
    {
        $this->make($rawPost);
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
}
