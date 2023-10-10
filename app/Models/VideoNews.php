<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoNews extends Model
{
    use HasFactory;

    protected $table = 'video_news';

    protected $fillable = [
        'title',
        'path'
    ];
}
