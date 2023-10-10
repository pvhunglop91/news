<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoNews\StoreVideoNewsRequest;
use App\Http\Requests\VideoNews\UpdateVideoNewsRequest;
use App\Services\VideoNewsService;

class VideoNewsController extends Controller
{
    protected $videoNewsService;

    public function __construct(VideoNewsService $videoNewsService)
    {
        $this->videoNewsService = $videoNewsService;
    }

    public function getList()
    {
        $videoNews = $this->videoNewsService->all();
        return view('Admin.videoNews.list', compact('videoNews'));
    }

    public function create()
    {
        return view('Admin.videoNews.add');
    }

    public function store(StoreVideoNewsRequest $request)
    {
        $this->videoNewsService->create($request);
        return redirect()->route('video-news.create')->with('message', 'Create video news success !');
    }

    public function edit($id)
    {
        $videoNews = $this->videoNewsService->findOrFail($id);
        return view('Admin.videoNews.edit', compact('videoNews'));
    }

    public function update(UpdateVideoNewsRequest $request, $id)
    {
        $this->videoNewsService->update($request, $id);
        return redirect()->route('video-news.list')->with('message', 'Update video news success !');
    }

    public function destroy($id)
    {
        $this->videoNewsService->delete($id);
        return redirect()->route('video-news.list')->with('message', 'Delete video news success !');
    }
}
