<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UpdateCategoryTest extends TestCase
{
    use Route;

    /** @test */
    public function unauthenticated_can_not_see_form_edit_category()
    {
        DB::begintransaction();
        $category = Category::factory()->create();
        $response = $this->get($this->getEditCategoryRoute($category->id));
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollback();
    }

    /** @test */
    public function authenticated_can_see_form_edit_category()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $category = Category::factory()->create();
        $response = $this->get($this->getEditCategoryRoute($category->id));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('Admin.category.edit');
        $response->assertSee('Edit Category');
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_update_form_category()
    {
        DB::beginTransaction();
        $category = Category::factory()->create();
        $dataUpdate = Category::factory()->make()->toArray();
        $response = $this->post($this->getUpdateCategoryRoute($category->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_update_category()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $category = Category::factory()->create();
        $dataUpdate = Category::factory()->make()->toArray();
        $response = $this->post($this->getUpdateCategoryRoute($category->id), $dataUpdate);
        $categoryCheck = Category::find($category->id);
        $this->assertSame($categoryCheck->name, $dataUpdate['name']);
        $response->assertRedirect($this->getListCategoryRoute());
        $response->assertStatus(Response::HTTP_FOUND);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_update_category_if_name_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $category = Category::factory()->create();
        $dataUpdate = Category::factory()->make(['name'=>''])->toArray();
        $response = $this->post($this->getUpdateCategoryRoute($category->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['name']);
        DB::rollBack();
    }
}
