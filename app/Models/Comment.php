<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'id_user',
        'id_news',
        'content'
    ];

    public function commentNews()
    {
        return $this->belongsTo(News::class,'id_news','id');
    }
    public function commentUser()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }
}
