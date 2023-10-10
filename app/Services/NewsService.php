<?php

namespace App\Services;

use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;

class NewsService
{
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function all()
    {
        return $this->newsRepository->getAllNews();
    }

    public function findOrFail($id)
    {
        return $this->newsRepository->findOrFail($id);
    }

    public function create($request)
    {
        $dataCreate = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = Str::random(20) . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images', $fileName,'public');
//            $path = 'storage/images/' .$fileName;
//            $img = Image::make($path);
//            $img->resize(300, 230);
            $dataCreate['image'] = $fileName;
        }
        $dataCreate['title_url'] = Str::slug($request->title, '-');
        return $this->newsRepository->create($dataCreate);
    }

    public function update($request, $id)
    {
        $news = $this->newsRepository->findOrFail($id);
        $dataUpdate = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('images', $fileName, 'public');
            $dataUpdate['image'] = $fileName;
            $news['image'] = $dataUpdate['image'];
        }
        $dataUpdate['title_url'] = Str::slug($request->title, '-');
        return $this->newsRepository->update($dataUpdate, $id);
    }

    public function delete($id)
    {
        return $this->newsRepository->delete($id);
    }

    public function getDataHeader($number)
    {
        return $this->newsRepository->getDataHeader($number);
    }

    public function getNewsHeader()
    {
        return $this->newsRepository->getNewsHeader();
    }

    public function getNewsTrending()
    {
        return $this->newsRepository->getNewsTrending();
    }

    public function getDataHighlight($number)
    {
        return $this->newsRepository->getDataHighlight($number);
    }

    public function getNewsDataWithTypeOfNews($typeOfNewsId)
    {
        return $this->newsRepository->getNewsDataWithTypeOfNews($typeOfNewsId);
    }

    public function getNewsWithTitleUrl($titleUrl)
    {
        return $this->newsRepository->getNewsWithTitleUrl($titleUrl);
    }

    public function getNewsRelated($typeOfNewsId)
    {
        return $this->newsRepository->getNewsRelated($typeOfNewsId);
    }

    public function updateView($titleUrl)
    {
        return $this->newsRepository->updateView($titleUrl);
    }

    public function getNewsSearched($keyword)
    {
        return $this->newsRepository->getNewsSearched($keyword);
    }

    public function searchNewsViewHigh($request)
    {
        $date = $request->start;
        return $this->newsRepository->searchNewsViewHigh($date);
    }
}
