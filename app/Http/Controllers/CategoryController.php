<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getIndex()
    {
        return view('Admin.layouts.index');
    }

    public function getList()
    {
        $categories = $this->categoryService->all();
        return view('Admin.category.list', compact('categories'));
    }

    public function create()
    {
        return view('Admin.category.add');
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->create($request);
        return redirect()->route('category.create')->with('message', 'Create category success');
    }

    public function edit($id)
    {
        $category = $this->categoryService->findOrFail($id);
        return view('Admin.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->categoryService->update($request, $id);
        return redirect()->route('category.list')->with('message', 'Update category success');
    }

    public function destroy($id)
    {
        $this->categoryService->delete($id);
        return redirect()->route('category.list')->with('message', 'Delete category success');
    }

    public function getCategoryNews($nameUrl)
    {
        $categories = $this->categoryService->all();
        $categoryUrl = $this->categoryService->getNewsWithNameUrl($nameUrl);
        $newsWithCategory = $this->categoryService->getData($nameUrl);
        return view('Admin.category.categorynews', compact('categories', 'categoryUrl', 'newsWithCategory'));
    }
}
