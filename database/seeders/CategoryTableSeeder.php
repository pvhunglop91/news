<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['name' => 'Xã Hội','name_url' => 'Xa-Hoi'],
            ['name' => 'Thế Giới','name_url' => 'The-Gioi'],
            ['name' => 'Kinh Doanh','name_url' => 'Kinh-Doanh'],
            ['name' => 'Văn Hoá','name_url' => 'Van-Hoa'],
            ['name' => 'Thể Thao','name_url' => 'The-Thao'],
            ['name' => 'Pháp Luật','name_url' => 'Phap-Luat'],
            ['name' => 'Đời Sống','name_url' => 'Doi-Song'],
            ['name' => 'Khoa Học','name_url' => 'Khoa-Hoc'],
            ['name' => 'Vi Tính','name_url' => 'Vi-Tinh']
        ]);
    }
}
