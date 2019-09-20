<?php

namespace App\Contracts\Repositories;

use App\Contracts\Entities\Entity;
use App\Entities\Post;

interface PostRepository extends Repository
{
    public function get(int $id): Post;
}
