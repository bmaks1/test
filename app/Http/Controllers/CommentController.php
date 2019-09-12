<?php

namespace App\Http\Controllers;

use App\Repositories\CommentsRepository;

use App\Http\Requests\StoreComment;

class CommentController extends Controller
{
    /**
     * @param CommentsRepository $comments
     */
    protected $comments;

    public function __construct(CommentsRepository $comments)
    {
        $this->comments =  $comments;
    }

    /**
     * Handle the incoming request.
     *

     * @param  StoreComment  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {
        $validated = $request->validated();
        $comment = $this->comments->create($validated);
        return view('comments.comment')
            ->withComment($comment);
    }
}
