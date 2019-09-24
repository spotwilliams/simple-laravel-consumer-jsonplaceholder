<?php

namespace App\Contracts\Repositories;

use App\Entities\Post;

interface PostRepository extends Repository
{
    public function find(int $id): Post;

    public function create(array $payload): Post;
}
