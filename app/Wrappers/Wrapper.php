<?php

namespace App\Wrappers;

use App\Contracts\Entities\Entity;
use Illuminate\Support\Str;

abstract class Wrapper
{
    public function attach(Entity $entity, string $relation, array $data)
    {
        $reflection = new \ReflectionClass($entity);
        $class = $this->className();
        $method = "attach" . Str::ucfirst(Str::singular($relation));

        if ($reflection->hasMethod($method)) {
            if ($this->isCollectionOf($data)) {
                $entity->{$method}(new $class($data));
            } else {
                foreach ($data as $elem) {
                    $entity->{$method}(new $class($elem));
                }
            }
        }
        dd($entity, $relation, $data);

        return $entity;
    }

    protected function isCollectionOf(array $data): bool
    {
        return count($data) === count($data, COUNT_RECURSIVE);
    }

    protected abstract function className(): string;
}
