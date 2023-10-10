<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\TypeOfNews;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->name;
        return [
            'title'=> $title,
            'title_url'=> Str::slug($title, '-'),
            'summary'=>$this->faker->text,
            'content'=>$this->faker->text,
            'image'=>'/upload/tintuc/fpt-1349269954.jpg',
            'highlight'=>'0',
            'view'=>'0',
            'id_type_of_news'=> TypeOfNews::factory()->create()->id,
        ];
    }
}
