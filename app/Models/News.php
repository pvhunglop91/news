<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'news';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'title_url',
        'summary',
        'content',
        'image',
        'highlight',
        'view',
        'id_type_of_news'
    ];

    public function newsTypeOfNews()
    {
        return $this->belongsTo(TypeOfNews::class, 'id_type_of_news', 'id');
    }

    public function newsComment()
    {
        return $this->hasMany(Comment::class,'id_news','id');
    }


}
