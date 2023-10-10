<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\NewsService;
use App\Services\TypeOfNewsService;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    protected $categoryService;

    protected $typeOfNewsService;

    protected $newsService;

    protected $videoNewsService;

    public function __construct (
        CategoryService $categoryService,
        TypeOfNewsService $typeOfNewsService,
        NewsService $newsService)
    {
        $this->categoryService = $categoryService;
        $this->typeOfNewsService = $typeOfNewsService;
        $this->newsService = $newsService;
        $this->videoNewsService = $newsService;
    }

    public function homepage()
    {   
        $dataHeader = $this->newsService->getDataHeader(4);
        $newsHeader = $this->newsService->getNewsHeader();
        $dataTrending = $this->newsService->getNewsTrending();
        return view('pages.homepage', compact('dataHeader', 'newsHeader', 'dataTrending'));
    }

    public function homepage1()
    {
        return redirect()->action([PagesController::class, 'homepage']);
    }

    public function category($nameUrl)
    {
        $categoryNameUrl = $this->categoryService->getNewsWithNameUrl($nameUrl);
        $data = $this->newsService->getDataHighlight(5);
        $dataTrending = $this->newsService->getNewsTrending();
        $typeOfNews = $this->typeOfNewsService->getTypeOfNewsTag();
        $dataPage = $this->categoryService->getData($nameUrl);
        if (!isset($categoryNameUrl)) {
            return redirect()->action([PagesController::class, 'homepage']);
        }
        return view('pages.category', compact('categoryNameUrl', 'data', 'dataTrending', 'typeOfNews', 'dataPage'));
    }

    public function typeOfNews($nameUrl)
    {
        $typeOfNewsUrl = $this->typeOfNewsService->getNewsWithNameUrl($nameUrl);
        $data = $this->newsService->getDataHighlight(5);
        $typeOfNews = $this->typeOfNewsService->getTypeOfNewsTag();
        $dataTrending = $this->newsService->getNewsTrending();
        $typeOfNewsId = $typeOfNewsUrl->id;
        $dataNews = $this->newsService->getNewsDataWithTypeOfNews($typeOfNewsId);
        if (!isset($typeOfNewsUrl)) {
            return redirect()->back();
        }
        return view('pages.typeOfNews', compact('typeOfNewsUrl', 'data','typeOfNews', 'dataTrending', 'dataNews'));
    }

    public function news($titleUrl)
    {
        $newsUrl = $this->newsService->getNewsWithTitleUrl($titleUrl);
        $dataTrending = $this->newsService->getNewsTrending();
        $typeOfNews = $this->typeOfNewsService->getTypeOfNewsTag();
        $typeOfNewsId = $newsUrl->id_type_of_news;
        $newsRelated = $this->newsService->getNewsRelated($typeOfNewsId);
        if (!isset($newsUrl)) {
            return redirect()->back();
        }
        $this->newsService->updateView($titleUrl);
        return view('pages.news', compact('newsUrl', 'dataTrending', 'typeOfNews', 'newsRelated'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $newsSearched = $this->newsService->getNewsSearched($keyword);
        if ($keyword == null) {
            return redirect()->back();
        }
        return view('pages.search', compact('keyword', 'newsSearched'));
    }

}
