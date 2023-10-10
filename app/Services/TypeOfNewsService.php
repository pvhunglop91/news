<?php

namespace App\Services;

use App\Repositories\TypeOfNewsRepository;
use Illuminate\Support\Str;

class TypeOfNewsService
{
    protected $typeOfNewsRepository;

    public function __construct(TypeOfNewsRepository $typeOfNewsRepository)
    {
        $this->typeOfNewsRepository = $typeOfNewsRepository;
    }

    public function all()
    {
        return $this->typeOfNewsRepository->all();
    }

    public function create($request)
    {
        $dataCreate = $request->all();
        $dataCreate['name_url'] = Str::slug($dataCreate['name'], '-');
        return $this->typeOfNewsRepository->create($dataCreate);
    }

    public function update($request, $id)
    {
        $dataUpdate = $request->all();
        $dataUpdate['name_url'] = Str::slug($dataUpdate['name'], '-');
        return $this->typeOfNewsRepository->update($dataUpdate, $id);
    }

    public function findOrFail($id)
    {
        return $this->typeOfNewsRepository->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->typeOfNewsRepository->delete($id);
    }

    public function getTypeOfNewsTag()
    {
        return $this->typeOfNewsRepository->getTypeOfNewsTag();
    }

    public function getNewsWithNameUrl($nameUrl)
    {
        return $this->typeOfNewsRepository->getNewsWithNameUrl($nameUrl);
    }

    public function getTypeOfNewsFromCategory($categoryId)
    {
        return $this->typeOfNewsRepository->getTypeOfNewsFromCategory($categoryId);
    }
}
