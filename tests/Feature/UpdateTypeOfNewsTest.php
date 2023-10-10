<?php

namespace Tests\Feature;

use App\Models\TypeOfNews;
use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UpdateTypeOfNewsTest extends TestCase
{
    use Route;

    /** @test */
    public function unauthenticated_can_not_see_form_edit_type_of_news()
    {
        DB::begintransaction();
        $typeOfNews = TypeOfNews::factory()->create();
        $response = $this->get($this->getEditTypeOfNewsRoute($typeOfNews->id));
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollback();
    }

    /** @test */
    public function authenticated_can_see_form_edit_type_of_news()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $typeOfNews = TypeOfNews::factory()->create();
        $response = $this->get($this->getEditTypeOfNewsRoute($typeOfNews->id));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('Admin.typeOfNews.edit');
        $response->assertSee('Edit Type Of News');
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_update_form_type_of_news()
    {
        DB::beginTransaction();
        $typeOfNews = TypeOfNews::factory()->create();
        $dataUpdate = TypeOfNews::factory()->make()->toArray();
        $response = $this->post($this->getUpdateTypeOfNewsRoute($typeOfNews->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_update_type_of_news()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $typeOfNews = TypeOfNews::factory()->create();
        $dataUpdate = TypeOfNews::factory()->make()->toArray();
        $response = $this->post($this->getUpdateTypeOfNewsRoute($typeOfNews->id), $dataUpdate);
        $categoryCheck = TypeOfNews::find($typeOfNews->id);
        $this->assertSame($categoryCheck->name, $dataUpdate['name']);
        $response->assertRedirect($this->getListTypeOfNewsRoute());
        $response->assertStatus(Response::HTTP_FOUND);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_update_type_of_news_if_name_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $typeOfNews = TypeOfNews::factory()->create();
        $dataUpdate = TypeOfNews::factory()->make(['name'=>''])->toArray();
        $response = $this->post($this->getUpdateTypeOfNewsRoute($typeOfNews->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['name']);
        DB::rollBack();
    }
}
