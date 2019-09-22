<?php

namespace App\Http\Controllers\Posts;

use App\Contracts\Repositories\PostRepository;
use App\Http\Controllers\Controller;

class PostCommentsController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth');
        $this->postRepository = $postRepository;
    }

    public function __invoke(int $id)
    {
        $post = $this->postRepository->findWith($id, 'comments');

        return view('posts.comments', compact('post'));
    }
}
