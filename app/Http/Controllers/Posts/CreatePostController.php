<?php

namespace App\Http\Controllers\Posts;

use App\Contracts\Repositories\PostRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    /** @var PostRepository */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $this->postRepository->create($request->all());

        session()->flash('success', 'Post created successfully');

        return redirect()->route('posts.list');
    }
}
