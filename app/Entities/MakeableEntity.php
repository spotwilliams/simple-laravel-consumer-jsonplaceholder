<?php

namespace App\Entities;

use App\Contracts\Entities\Entity;

trait MakeableEntity
{
   private function make(array $data): Entity
   {
       foreach ($data as $attr => $value) {
           $this->{$attr} = $value;
       }

       return $this;
   }
}
