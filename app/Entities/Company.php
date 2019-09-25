<?php

namespace App\Entities;

use App\Contracts\Entities\Entity;

class Company implements Entity
{
    use MakeableEntity;

    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $catchPhrase;
    /** @var string */
    private $bs;

    public function __construct(array $data)
    {
        $this->make($data);
    }

    /**
     * @return string
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
    public function getCatchPhrase(): string
    {
        return $this->catchPhrase;
    }

    /**
     * @return string
     */
    public function getBs(): string
    {
        return $this->bs;
    }
}
