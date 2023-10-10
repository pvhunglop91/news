<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfNews extends Model
{
    use HasFactory;

    protected $table = 'type_of_news';

    protected $fillable = [
        'id_category',
        'name',
        'name_url'
    ];

    public function typeOfNewsCategory()
    {
        return $this->belongsTo(Category::class,'id_category','id');
    }

    public function tyoeOfNewsNews()
    {
        return $this->hasMany(News::class, 'id_type_of_news', 'id');
    }
}
