<?php

namespace App\Http\Controllers\Posts;

use App\Contracts\Repositories\CommentRepository;
use App\Contracts\Repositories\PostRepository;
use App\Entities\Comment;
use App\Entities\Post;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class ViewPostController extends Controller
{
    /** @var PostRepository */
    private $postRepository;
    /** @var CommentRepository */
    private $commentRepository;
    private $perPage;

    public function __construct(PostRepository $postRepository, CommentRepository $commentRepository)
    {
        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;
        $this->perPage = 20;
    }

    public function __invoke(int $id)
    {
        /** @var Post $post */
        $post = $this->postRepository->find($id);

        $comments = new LengthAwarePaginator(
            $this->commentRepository->byPost($post)->forPage(Input::get('page') ?? 1, $this->perPage),
            $post->getComments()->count(),
            $this->perPage
        );

        $comments->setPath(route('posts.view', ['id' => $id]));

        return view('posts.view', compact('post', 'comments'));
    }
}
