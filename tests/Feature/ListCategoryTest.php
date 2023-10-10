<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Traits\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ListCategoryTest extends TestCase
{
    use Route;

    /** @test */
    public function authenticate_can_get_list_category()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $response = $this->get($this->getListCategoryRoute());
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('Admin.category.list');
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_get_list_category()
    {
        DB::beginTransaction();
        $response = $this->get($this->getListCategoryRoute());
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }
}
