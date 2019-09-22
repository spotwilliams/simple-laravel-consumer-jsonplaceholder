<?php

namespace App\Contracts\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

interface Repository
{
    public function find(int $id);

    public function findWith(int $id, string $relation);

    public function all(): Collection;

    public function paginate(): Paginator;

    public function delete(int $id): bool;

    public function update(int $id, $payload);

    public function create($payload);
}
