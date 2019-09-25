<?php

namespace App\Http\Controllers\Comments;

use App\Contracts\Repositories\CommentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateCommentController extends Controller
{
    /** @var CommentRepository */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function __invoke(Request $request)
    {
        $this->commentRepository->create($request->all());

        session()->flash('success', 'Comment created successfully');

        return redirect()->route('posts.view', ['id' => $request->get('postId')]);
    }
}
