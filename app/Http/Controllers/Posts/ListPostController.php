<?php

namespace App\Http\Controllers\Posts;

use App\Contracts\Repositories\PostRepository;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class ListPostController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;
    private $perPage;


    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->perPage = 10;
    }

    public function __invoke()
    {
        $posts = $this->postRepository->all();

        $posts = new LengthAwarePaginator(
            $posts->forPage(Input::get('page') ?? 1, $this->perPage),
            $posts->count(),
            $this->perPage);

        $posts->setPath(route('posts.list'));

        return view('posts.list', compact('posts'));
    }
}
