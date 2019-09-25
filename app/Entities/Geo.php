<?php

namespace App\Entities;

use App\Contracts\Entities\Entity;

class Geo implements Entity
{
    use MakeableEntity;

    /** @var int */
    private $id;
    /** @var float */
    private $lat;
    /** @var float */
    private $lng;


    public function __construct(array $data)
    {
        $this->make($data);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
    }
}
