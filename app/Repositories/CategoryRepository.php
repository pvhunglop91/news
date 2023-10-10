<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{

    public function model()
    {
        return Category::class;
    }

    public function getNewsWithNameUrl($nameUrl)
    {
        return $this->model->where('name_url', $nameUrl)->first();
    }

    public function getData($nameUrl)
    {
        return $this->model->join('type_of_news', 'category.id', 'type_of_news.id_category')
            ->join('news', 'type_of_news.id', 'news.id_type_of_news')
            ->where('id_category', $this->getNewsWithNameUrl($nameUrl)->id)
            ->paginate(6);
    }
}
