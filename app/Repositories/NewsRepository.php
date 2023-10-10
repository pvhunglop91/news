<?php

namespace App\Repositories;

use App\Models\News;

class NewsRepository extends BaseRepository
{
    public function model()
    {
        return News::class;
    }

    public function getAllNews()
    {
        return $this->model->get();
    }

    public function getDataHeader($number)
    {
        return $this->model->orderBy('created_at', 'desc')->skip(1)->take($number)->get();
    }

    public function getNewsHeader()
    {
        return $this->model->orderBy('created_at', 'desc')->first();
    }

    public function getNewsTrending()
    {
        return $this->model->orderBy('view', 'desc')->take(5)->get();
    }

    public function getDataHighlight($number)
    {
        return $this->model->where('highlight', config('constants.highlight.yes'))->orderBy('created_at', 'desc')->skip(1)->take($number)->get();
    }

    public function getNewsDataWithTypeOfNews($typeOfNewsId)
    {
        return $this->model->where('id_type_of_news', $typeOfNewsId)->orderBy('created_at', 'desc')->paginate(6);
    }

    public function getNewsWithTitleUrl($titleUrl)
    {
        return $this->model->where('title_url', $titleUrl)->first();
    }

    public function getNewsRelated($typeOfNewsId)
    {
        return $this->model->where('id_type_of_news', $typeOfNewsId)->skip(1)->take(10)->get();
    }

    public function updateView($titleUrl)
    {
        $news = $this->getNewsWithTitleUrl($titleUrl);
        return $this->model->where('id', $news->id)->update(['view' => $news->view + 1]);
    }

    public function getNewsSearched($keyword)
    {
        return $this->model->where('title', 'like', "%$keyword%")
            ->orWhere('summary', 'like', "%$keyword%")
            ->orWhere('content', 'like', "%$keyword%")
            ->paginate(5);
    }

    public function searchNewsViewHigh($date)
    {
        return $this->model->where('created_at', 'like', '%' . $date . '%')->orderBy('view', 'desc')->get();
    }
}
