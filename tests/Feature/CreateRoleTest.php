<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CreateRoleTest extends TestCase
{
    use Route;

    /** @test */
    public function unauthenticated_can_not_see_form_create_role()
    {
        DB::beginTransaction();
        $response = $this->get($this->getCreateRoleRoute());
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticated_can_see_form_create_role()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $response = $this->get($this->getCreateRoleRoute());
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('Admin.role.add');
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_create_form_role()
    {
        DB::beginTransaction();
        $role = Role::factory()->make()->toArray();
        $response = $this->post($this->getStoreRoleRoute(), $role);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticated_can_store_role()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = Role::factory()->make()->toArray();
        $roleAfter = Role::count();
        $response = $this->post($this->getStoreRoleRoute(), $data);
        $roleBefore = Role::count();
        $this->assertEquals($roleAfter + 1, $roleBefore);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect($this->getCreateRoleRoute());
        DB::rollBack();
    }
    /** @test */
    public function authenticate_can_not_store_role_if_name_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = Role::factory()->make(['name'=>''])->toArray();
        $response = $this->post($this->getStoreRoleRoute(), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['name']);
        DB::rollBack();
    }
}
