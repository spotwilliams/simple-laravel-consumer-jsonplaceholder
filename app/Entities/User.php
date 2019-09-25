<?php

namespace App\Entities;

use App\Contracts\Entities\Entity;

class User implements Entity
{
    use MakeableEntity;

    /** @var string */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $username;
    /** @var string */
    private $email;
    /** @var Address */
    private $address;
    /** @var Company */
    private $company;
    /** @var string */
    private $phone;
    /** @var string */
    private $website;

    public function __construct(array $data)
    {
        $this->make($data);
        $this->address = new Company($data['company']);
        $this->address = new Address($data['adress']);
    }
}
