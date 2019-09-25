<?php

namespace App\Contracts\Repositories;

use App\Entities\Post;
use Illuminate\Support\Collection;

interface CommentRepository extends Repository
{
    public function byPost(Post $post): Collection;
}
