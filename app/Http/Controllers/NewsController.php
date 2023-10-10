<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Services\CategoryService;
use App\Services\NewsService;
use App\Services\TypeOfNewsService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
// use mysql_xdevapi\Exception;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    protected $newsService;

    protected $categoryService;

    protected $typeOfNewsService;

    public function __construct(NewsService $newsService, CategoryService $categoryService, TypeOfNewsService $typeOfNewsService)
    {
        $this->newsService = $newsService;
        $this->categoryService = $categoryService;
        $this->typeOfNewsService = $typeOfNewsService;
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->newsService->all();
            foreach ($data as $key => $item) {
                $data[$key]->typeOfNews = $item->newsTypeOfNews;
                $data[$key]->typeOfNews->category = $item->newsTypeOfNews->typeOfNewsCategory;
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        $news = $this->newsService->all();
        foreach ($news as $key => $item) {
            $news[$key]->typeOfNews = $item->newsTypeOfNews;
            $news[$key]->typeOfNews->category = $item->newsTypeOfNews->typeOfNewsCategory;
        }
        return view('Admin.news.list', compact('news'));
    }

    public function create()
    {
        $category = $this->categoryService->all();
        return view('Admin.news.add', compact('category'));
    }

    public function store(StoreNewsRequest $request)
    {
        $this->newsService->create($request);
        return redirect()->route('news.create')->with('message', 'Create news success !');
    }

    public function edit($id)
    {
        $category = $this->categoryService->all();
        $news = $this->newsService->findOrFail($id);
        return view('Admin.news.edit', compact('category',  'news'));
    }

    public function update(UpdateNewsRequest $request, $id)
    {
        $this->newsService->update($request, $id);
        return redirect()->route('news.list')->with('message', 'Update news success !');
    }

    public function destroy($id)
    {
        try {
            $this->newsService->delete($id);
            return response()->json([
                'message' => 'Delete news success !',
            ], Response::HTTP_OK);
        }catch(Exception $exception){
            return response()->json([
                'message' => 'Error ',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
