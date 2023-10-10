<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Traits\Route;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateCategoryTest extends TestCase
{
    use Route;

    /** @test */
    public function unauthenticated_can_not_see_form_create_category()
    {
        DB::beginTransaction();
        $response = $this->get($this->getCreateCategoryRoute());
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticated_can_see_form_create_category()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $response = $this->get($this->getCreateCategoryRoute());
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('Admin.category.add');
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_create_form_category()
    {
        DB::beginTransaction();
        $category = Category::factory()->make()->toArray();
        $response = $this->post($this->getStoreCategoryRoute(), $category);
        dd($response);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_store_category()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = Category::factory()->make()->toArray();
        $categoryAfter = Category::count();
        $response = $this->post($this->getStoreCategoryRoute(), $data);
        $categoryBefore = Category::count();
        $this->assertEquals($categoryAfter + 1, $categoryBefore);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect($this->getCreateCategoryRoute());
        DB::rollBack();
    }
    /** @test */
    public function authenticate_can_not_store_category_if_name_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = Category::factory()->make(['name'=>''])->toArray();
        $response = $this->post($this->getStoreCategoryRoute(), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['name']);
        DB::rollBack();
    }
}
