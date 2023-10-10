<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use App\Services\NewsService;

class CommentController extends Controller
{
    protected $commentService;

    protected $newsService;

    public function __construct(CommentService $commentService, NewsService $newsService)
    {
        $this->commentService = $commentService;
        $this->newsService = $newsService;
    }

    public function destroy($id, $idNews)
    {
        $this->commentService->delete($id);
        return redirect('admin/news/edit/'.$idNews)->with('message', 'Delete comment success !');
    }

    public function postComment(CommentRequest $request, $id)
    {
        $news = $this->newsService->findOrFail($id);
        $this->commentService->create($request, $id);
        return redirect("news/" . $news->title_url);

    }
}
