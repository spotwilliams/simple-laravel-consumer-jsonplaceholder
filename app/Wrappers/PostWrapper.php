<?php

namespace App\Wrappers;

use App\Entities\Post;

class PostWrapper extends Wrapper
{
    protected function className(): string
    {
        return Post::class;
    }

}
