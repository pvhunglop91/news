<?php

namespace App\Repositories;

use App\Models\TypeOfNews;

class TypeOfNewsRepository extends BaseRepository
{

    public function model()
    {
       return TypeOfNews::class;
    }

    public function getTypeOfNewsTag()
    {
        return $this->model->all();
    }

    public function getNewsWithNameUrl($nameUrl)
    {
        return $this->model->where('name_url', $nameUrl)->first();
    }

    public function getTypeOfNewsFromCategory($categoryId)
    {
        return $this->model->where('id_category', $categoryId)->get();
    }
}
