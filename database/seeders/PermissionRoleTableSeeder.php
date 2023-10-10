<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            //admin

            //cate
            ['permission_id' => 1, 'role_id' => 1],
            ['permission_id' => 2, 'role_id' => 1],
            ['permission_id' => 3, 'role_id' => 1],
            ['permission_id' => 4, 'role_id' => 1],
            //tyoeofnews
            ['permission_id' => 5, 'role_id' => 1],
            ['permission_id' => 6, 'role_id' => 1],
            ['permission_id' => 7, 'role_id' => 1],
            ['permission_id' => 8, 'role_id' => 1],
            //news
            ['permission_id' => 9, 'role_id' => 1],
            ['permission_id' => 10, 'role_id' => 1],
            ['permission_id' => 11, 'role_id' => 1],
            ['permission_id' => 12, 'role_id' => 1],
            //user
            ['permission_id' => 13, 'role_id' => 1],
            ['permission_id' => 14, 'role_id' => 1],
            ['permission_id' => 15, 'role_id' => 1],
            ['permission_id' => 16, 'role_id' => 1],
            //role
            ['permission_id' => 17, 'role_id' => 1],
            ['permission_id' => 18, 'role_id' => 1],
            ['permission_id' => 19, 'role_id' => 1],
            ['permission_id' => 20, 'role_id' => 1],
            //video
            ['permission_id' => 21, 'role_id' => 1],
            ['permission_id' => 22, 'role_id' => 1],
            ['permission_id' => 23, 'role_id' => 1],
            ['permission_id' => 24, 'role_id' => 1],
            //comment
            ['permission_id' => 25, 'role_id' => 1],
            ['permission_id' => 26, 'role_id' => 1],
            //login
            ['permission_id' => 27, 'role_id' => 1],

            //author

            //cate
            ['permission_id' => 1, 'role_id' => 2],
            ['permission_id' => 2, 'role_id' => 2],
            ['permission_id' => 3, 'role_id' => 2],
            ['permission_id' => 4, 'role_id' => 2],
            //tyoeofnews
            ['permission_id' => 5, 'role_id' => 2],
            ['permission_id' => 6, 'role_id' => 2],
            ['permission_id' => 7, 'role_id' => 2],
            ['permission_id' => 8, 'role_id' => 2],
            //news
            ['permission_id' => 9, 'role_id' => 2],
            ['permission_id' => 10, 'role_id' => 2],
            ['permission_id' => 11, 'role_id' => 2],
            ['permission_id' => 12, 'role_id' => 2],
            //video
            ['permission_id' => 21, 'role_id' => 2],
            ['permission_id' => 22, 'role_id' => 2],
            ['permission_id' => 23, 'role_id' => 2],
            ['permission_id' => 24, 'role_id' => 2],
            //comment
            ['permission_id' => 25, 'role_id' => 2],
            ['permission_id' => 26, 'role_id' => 2],
            //login
            ['permission_id' => 27, 'role_id' => 2],


            //censor

            //cate
            ['permission_id' => 1, 'role_id' => 3],
            ['permission_id' => 2, 'role_id' => 3],
            ['permission_id' => 3, 'role_id' => 3],
            ['permission_id' => 4, 'role_id' => 3],
            //tyoeofnews
            ['permission_id' => 5, 'role_id' => 3],
            ['permission_id' => 6, 'role_id' => 3],
            ['permission_id' => 7, 'role_id' => 3],
            ['permission_id' => 8, 'role_id' => 3],
            //news
            ['permission_id' => 9, 'role_id' => 3],
            ['permission_id' => 10, 'role_id' => 3],
            ['permission_id' => 11, 'role_id' => 3],
            ['permission_id' => 12, 'role_id' => 3],
            //user
            ['permission_id' => 17, 'role_id' => 3],
            ['permission_id' => 18, 'role_id' => 3],
            ['permission_id' => 19, 'role_id' => 3],
            ['permission_id' => 20, 'role_id' => 3],
            //video
            ['permission_id' => 21, 'role_id' => 3],
            ['permission_id' => 22, 'role_id' => 3],
            ['permission_id' => 23, 'role_id' => 3],
            ['permission_id' => 24, 'role_id' => 3],
            //comment
            ['permission_id' => 25, 'role_id' => 3],
            ['permission_id' => 26, 'role_id' => 3],
            //login
            ['permission_id' => 27, 'role_id' => 3],

            //member
            //cate
            ['permission_id' => 1, 'role_id' => 4],
            //tyoeofnews
            ['permission_id' => 5, 'role_id' => 4],
            //news
            ['permission_id' => 9, 'role_id' => 4],
            //video
            ['permission_id' => 21, 'role_id' => 4],
            //comment
            ['permission_id' => 25, 'role_id' => 4],
            ['permission_id' => 26, 'role_id' => 4],
            //login
            ['permission_id' => 27, 'role_id' => 4],
        ]);

    }
}
