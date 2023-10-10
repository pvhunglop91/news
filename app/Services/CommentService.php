<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function delete($id)
    {
        return $this->commentRepository->delete($id);
    }

    public function create($request, $id)
    {
        $comment = $request->all();
        $comment['id_news'] = $id;
        $comment['id_user'] = Auth::user()->id;
        return $this->commentRepository->create($comment);
    }
}
