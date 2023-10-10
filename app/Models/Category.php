<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'name_url'
    ];

    public function categoryTypeOfNews()
    {
        return $this->hasMany(TypeOfNews::class, 'id_category', 'id');
    }
    public function categoryNews()
    {
        return $this->hasManyThrough(News::class, TypeOfNews::class, 'id_category', 'id_type_of_news', 'id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'id_type_of_news');
    }
}
