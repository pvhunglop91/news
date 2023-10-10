<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Traits\Route;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use Tests\TestCase;

class DeleteCategoryTest extends TestCase
{
    use Route;

    /** @test */
    public function authenticate_can_delete_category()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $category = Category::factory()->create();
        $countCategoryBefore = Category::count();
        $response = $this->get($this->getDestroyCategoryRoute($category->id));
        $countCategoryAfter = Category::count();
        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertEquals($countCategoryBefore - 1, $countCategoryAfter);
        $this->assertDatabaseMissing('category', $category->toArray());
        DB::rollBack();
    }

    /** @test */
    public function unauthenticate_can_not_delete_category()
    {
        DB::beginTransaction();
        $category = Category::factory()->create();
        $response = $this->get($this->getDestroyCategoryRoute($category->id));
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }
}
