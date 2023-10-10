<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Str;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function all()
    {
        return $this->categoryRepository->all();
    }

    public function create($request)
    {
        $data = $request->all();
        $data['name_url'] = Str::slug($data['name'], '-');
        return $this->categoryRepository->create($data);
    }

    public function findOrFail($id)
    {
        return $this->categoryRepository->findOrFail($id);
    }

    public function update($request, $id)
    {
        return $this->categoryRepository->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function getNewsWithNameUrl($nameUrl)
    {
        return $this->categoryRepository->getNewsWithNameUrl($nameUrl);
    }

    public function getData($nameUrl)
    {
        return $this->categoryRepository->getData($nameUrl);
    }
}
