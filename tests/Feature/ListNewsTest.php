<?php

namespace Tests\Feature;

use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ListNewsTest extends TestCase
{
    use Route;

    /** @test */
    public function authenticate_can_get_list_news()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $response = $this->get($this->getListNewsRoute());
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('Admin.news.list');
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_get_list_news()
    {
        DB::beginTransaction();
        $response = $this->get($this->getListNewsRoute());
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }
}
