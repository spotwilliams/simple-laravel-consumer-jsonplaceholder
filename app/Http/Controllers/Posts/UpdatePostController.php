<?php

namespace App\Http\Controllers\Posts;

use App\Contracts\Repositories\PostRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdatePostController extends Controller
{
    /** @var PostRepository */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function __invoke(int $id, Request $request)
    {
        /** @var  $post */
        $post = $this->postRepository->update($id, $request->all());
        session()->flash('success', 'Post updated successfully');
        return view('posts.view', compact('post'));
    }
}
