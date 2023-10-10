<?php

namespace App\Repositories;

use App\Models\User;

class CustomAuthRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }
}
