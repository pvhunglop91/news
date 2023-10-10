<?php

namespace Tests\Feature;

use App\Models\News;
use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CreateNewsTest extends TestCase
{
    use Route;

    /** @test */
    public function unauthenticated_can_not_see_form_create_news()
    {
        DB::beginTransaction();
        $response = $this->get($this->getCreateNewsRoute());
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticated_can_see_form_create_news()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $response = $this->get($this->getCreateNewsRoute());
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('Admin.news.add');
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_create_form_news()
    {
        DB::beginTransaction();
        $news = News::factory()->make()->toArray();
        $response = $this->post($this->getStoreNewsRoute(), $news);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticated_can_store_news()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = News::factory()->make()->toArray();
//        dd($data);
        $newsAfter = News::count();
        $response = $this->post($this->getStoreNewsRoute(), $data);
        $newsBefore = News::count();
        $this->assertEquals($newsAfter + 1, $newsBefore);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect($this->getCreateNewsRoute());
        DB::rollBack();
    }
    /** @test */
    public function authenticate_can_not_store_news_if_title_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = News::factory()->make(['title'=>''])->toArray();
        $response = $this->post($this->getStoreNewsRoute(), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['title']);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_store_news_if_typeOfNews_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = News::factory()->make(['typeOfNews'=>''])->toArray();
        $response = $this->post($this->getStoreNewsRoute(), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['typeOfNews']);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_store_news_if_image_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = News::factory()->make(['image'=>''])->toArray();
        $response = $this->post($this->getStoreNewsRoute(), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['image']);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_store_news_if_summary_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = News::factory()->make(['summary'=>''])->toArray();
        $response = $this->post($this->getStoreNewsRoute(), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['summary']);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_store_news_if_content_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = News::factory()->make(['content'=>''])->toArray();
        $response = $this->post($this->getStoreNewsRoute(), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['content']);
        DB::rollBack();
    }
}
