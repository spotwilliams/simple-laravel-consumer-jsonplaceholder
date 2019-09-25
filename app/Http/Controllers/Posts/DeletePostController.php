<?php

namespace App\Http\Controllers\Posts;

use App\Contracts\Repositories\PostRepository;
use App\Http\Controllers\Controller;

class DeletePostController extends Controller
{
    /** @var PostRepository */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function __invoke(int $id)
    {
        $this->postRepository->delete($id);

        session()->flash('success', 'Post deleted successfully');

        return redirect()->route('posts.list');
    }
}
