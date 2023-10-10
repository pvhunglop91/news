<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository extends BaseRepository
{
    public function model()
    {
        return Permission::class;
    }
}
