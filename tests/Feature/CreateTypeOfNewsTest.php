<?php

namespace Tests\Feature;

use App\Models\TypeOfNews;
use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CreateTypeOfNewsTest extends TestCase
{
    use Route;

    /** @test */
    public function unauthenticated_can_not_see_form_create_type_of_news()
    {
        DB::beginTransaction();
        $response = $this->get($this->getCreateTypeOfNewsRoute());
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticated_can_see_form_create_type_of_news()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $response = $this->get($this->getCreateTypeOfNewsRoute());
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('Admin.typeOfNews.add');
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_create_form_type_of_news()
    {
        DB::beginTransaction();
        $typeOfNews = TypeOfNews::factory()->make()->toArray();
        $response = $this->post($this->getStoreTypeOfNewsRoute(), $typeOfNews);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_store_type_of_news()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = TypeOfNews::factory()->make()->toArray();
        $typeOfNewsAfter = TypeOfNews::count();
        $response = $this->post($this->getStoreTypeOfNewsRoute(), $data);
        $typeOfNewsBefore = TypeOfNews::count();
        $this->assertEquals($typeOfNewsAfter + 1, $typeOfNewsBefore);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect($this->getCreateTypeOfNewsRoute());
        DB::rollBack();
    }
    /** @test */
    public function authenticate_can_not_store_type_of_news_if_name_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = TypeOfNews::factory()->make(['name'=>''])->toArray();
        $response = $this->post($this->getStoreTypeOfNewsRoute(), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['name']);
        DB::rollBack();
    }
}
