<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = array(
            'Bài viết rất hay',
            'Tôi rất thích bài viết này',
            'Bài viết này tạm ổn',
            'Hay quá trời',
            'Tôi sẽ học thèo bài viết này',
            'Bài viết này chưa được hay lắm',
            'Ý kiến của tôi khác so với bài này',
            'Bài viết này được',
            'Không thích bài viết này',
            'Tôi chưa có ý kiến gì'
        );

        for($i=1;$i<=100;$i++)
        {
            DB::table('comment')->insert(
                [
                    'id_user' => rand(1,10),
                    'id_news' => rand(1,100),
                    'content' => $content[rand(0,9)],
                    'created_at' => new DateTime(),

                ]
            );
        }
    }
}
