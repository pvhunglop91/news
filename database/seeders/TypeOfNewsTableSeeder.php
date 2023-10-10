<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOfNewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_news')->insert([
            ['id_category'=>'1','name' => 'Giáo Dục','name_url' => 'Giao-Duc'],
            ['id_category'=>'1','name' => 'Nhịp Điệu Trẻ','name_url' => 'Nhip-Dieu-Tre'],
            ['id_category'=>'1','name' => 'Du Lịch','name_url' => 'Du-Lich'],
            ['id_category'=>'1','name' => 'Du Học','name_url' => 'Du-Hoc'],
            ['id_category'=>'2','name' => 'Cuộc Sống Đó Đây','name_url' => 'Cuoc-Song-Do-Day'],
            ['id_category'=>'2','name' => 'Ảnh','name_url' => 'Anh'],
            ['id_category'=>'2','name' => 'Người Việt 5 Châu','name_url' => 'Nguoi-Viet-5-Chau'],
            ['id_category'=>'2','name' => 'Phân Tích','name_url' => 'Phan-Tich'],
            ['id_category'=>'3','name' => 'Chứng Khoán','name_url' => 'Chung-Khoan'],
            ['id_category'=>'3','name' => 'Bất Động Sản','name_url' => 'Bat-Dong-San'],
            ['id_category'=>'3','name' => 'Doanh Nhân','name_url' => 'Doanh-Nhan'],
            ['id_category'=>'3','name' => 'Quốc Tế','name_url' => 'Quoc-Te'],
            ['id_category'=>'3','name' => 'Mua Sắm','name_url' => 'Mua-Sam'],
            ['id_category'=>'3','name' => 'Doanh Nghiệp Viết','name_url' => 'Doanh-Nghiep-Viet'],
            ['id_category'=>'4','name' => 'Hoa Hậu','name_url' => 'Hoa-Hau'],
            ['id_category'=>'4','name' => 'Nghệ Sỹ','name_url' => 'Nghe-Sy'],
            ['id_category'=>'4','name' => 'Âm Nhạc','name_url' => 'Am-Nhac'],
            ['id_category'=>'4','name' => 'Thời Trang','name_url' => 'Thoi-Trang'],
            ['id_category'=>'4','name' => 'Điện Ảnh','name_url' => 'Dien-Anh'],
            ['id_category'=>'4','name' => 'Mỹ Thuật','name_url' => 'My-Thuat'],
            ['id_category'=>'5','name' => 'Bóng Đá','name_url' => 'Bong-Da'],
            ['id_category'=>'5','name' => 'Tennis','name_url' => 'Tennis'],
            ['id_category'=>'5','name' => 'Chân Dung','name_url' => 'Chan-Dung'],
            ['id_category'=>'5','name' => 'Ảnh','name_url' => 'Anh-TT'],
            ['id_category'=>'6','name' => 'Hình Sự','name_url' => 'Hinh-Su']
        ]);
    }
}
