<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface Repository
{
    public function find(int $id);

    public function findWith(int $id, string $relation);

    public function all(): Collection;

    public function delete(int $id): bool;

    public function update(int $id, $payload);

    public function create(array $payload);
}
