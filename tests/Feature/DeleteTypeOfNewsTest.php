<?php

namespace Tests\Feature;

use App\Models\TypeOfNews;
use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DeleteTypeOfNewsTest extends TestCase
{
    use Route;

    /** @test */
    public function authenticate_can_delete_type_of_news()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $typeOfNews = TypeOfNews::factory()->create();
        $countCategoryBefore = TypeOfNews::count();
        $response = $this->get($this->getDestroyTypeOfNewsRoute($typeOfNews->id));
        $countCategoryAfter = TypeOfNews::count();
        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertEquals($countCategoryBefore - 1, $countCategoryAfter);
        $this->assertDatabaseMissing('type_of_news', $typeOfNews->toArray());
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_delete_type_of_news()
    {
        DB::beginTransaction();
        $typeOfNews = TypeOfNews::factory()->create();
        $response = $this->get($this->getDestroyTypeOfNewsRoute($typeOfNews->id));
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }
}
