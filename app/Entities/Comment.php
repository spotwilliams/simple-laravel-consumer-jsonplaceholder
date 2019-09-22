<?php

namespace App\Entities;

use App\Contracts\Entities\Entity;

class Comments implements Entity
{
    use MakeableEntity;

    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $body;
    /** @var string */
    private $email;

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
    public function getName(): string
    {
        return $this->name;
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
    public function getEmail(): string
    {
        return $this->email;
    }
}
