<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeOfNews\StoreTypeOfNewsRequest;
use App\Http\Requests\TypeOfNews\UpdateTypeOfNewsRequest;
use App\Services\CategoryService;
use App\Services\TypeOfNewsService;
use Illuminate\Http\Response;
// use mysql_xdevapi\Exception;
use Exception;

class TypeOfNewsController extends Controller
{
    protected $typeOfNewsService;
    protected $categoryService;

    public function __construct(TypeOfNewsService $typeOfNewsService, CategoryService $categoryService)
    {
        $this->typeOfNewsService = $typeOfNewsService;
        $this->categoryService = $categoryService;
    }

    public function getList()
    {
        $typeOfNews = $this->typeOfNewsService->all();
        return view('Admin.typeOfNews.list', compact('typeOfNews'));
    }

    public function create()
    {
        $category = $this->categoryService->all();
        return view('Admin.typeOfNews.add', compact('category'));
    }

    public function store(StoreTypeOfNewsRequest $request)
    {
        $this->typeOfNewsService->create($request);
        return redirect()->route('type_of_news.create')->with('message', 'Create Type Of News success !');
    }

    public function edit($id)
    {
        $category = $this->categoryService->all();
        $typeOfNews = $this->typeOfNewsService->findOrFail($id);
        return view('Admin.typeOfNews.edit', compact('category', 'typeOfNews'));
    }

    public function update(UpdateTypeOfNewsRequest $request, $id)
    {
        $this->typeOfNewsService->update($request, $id);
        return redirect()->route('type_of_news.list')
            ->with('message', 'Update Type Of News Success !');
    }

    public function destroy($id)
    {
        $this->typeOfNewsService->delete($id);
        return redirect()->route('type_of_news.list')->with('message', 'Delete Type Of News success');
    }

    public function getWithCategory($categoryId)
    {
        try {
            $data = $this->typeOfNewsService->getTypeOfNewsFromCategory($categoryId);
            return response()->json([
                'message' => 'List Type Of News ',
                'data' => $data
            ], Response::HTTP_OK);
        }catch (Exception $exception){
            return response()->json([
                'message' => 'Error ',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
