<?php

namespace App\Repositories;

use App\Models\VideoNews;

class VideoNewsRepository extends BaseRepository
{
    public function model()
    {
        return VideoNews::class;
    }
}
