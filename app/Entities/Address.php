<?php

namespace App\Entities;

use App\Contracts\Entities\Entity;

class Address implements Entity
{
    use MakeableEntity;

    /** @var int */
    private $id;
    /** @var string */
    private $street;
    /** @var string */
    private $suite;
    /** @var string */
    private $city;
    /** @var string */
    private $zipcode;
    /** @var Geo */
    private $geo;

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
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getSuite(): string
    {
        return $this->suite;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @return Geo
     */
    public function getGeo(): Geo
    {
        return $this->geo;
    }
}
