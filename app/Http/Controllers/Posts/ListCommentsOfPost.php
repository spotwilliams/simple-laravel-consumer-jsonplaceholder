<?php

namespace App\Http\Controllers\Posts;

use App\Contracts\Repositories\PostRepository;
use App\Entities\Post;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class ListCommentsOfPost extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;
    private $perPage;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->perPage = 20;
    }

    public function __invoke(int $id)
    {
        /** @var Post $post */
        $post = $this->postRepository->findWith($id, 'comments');

        $comments = new LengthAwarePaginator(
            $post->getComments()->forPage(Input::get('page') ?? 1, $this->perPage),
            $post->getComments()->count(),
            $this->perPage);
        $comments->setPath(route('posts.comments', ['id' => $id]));

        return view('posts.comments', compact('post', 'comments'));
    }
}
