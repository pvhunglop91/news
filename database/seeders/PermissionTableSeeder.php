<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'type-of-news-list',
            'type-of-news-create',
            'type-of-news-edit',
            'type-of-news-delete',
            'news-list',
            'news-create',
            'news-edit',
            'news-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'video-news-list',
            'video-news-create',
            'video-news-edit',
            'video-news-delete',
            'comment',
            'comment-delete',
            'login'
        ];
        DB::table('roles')->insert([
            ['name'=>'Admin'],
            ['name'=>'Author'],
            ['name'=>'Censor'],
            ['name'=>'Member']
        ]);

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $role_id = Role::all()->pluck('id')->toArray();
        $per_id = Permission::all()->pluck('id')->toArray();
        for($i=0;$i<count($role_id);$i++){
            for($j=0;$j<count($per_id);$j++){
                DB::table('permission_role')->insert([
                    ['role_id'=>$role_id[$i],'permission_id'=>$per_id[$j]],
                ]);
            }
        }
    }
}
