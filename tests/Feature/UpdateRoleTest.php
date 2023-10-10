<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UpdateRoleTest extends TestCase
{
    use Route;

    /** @test */
    public function unauthenticated_can_not_see_form_edit_role()
    {
        DB::begintransaction();
        $role = Role::factory()->create();
        $response = $this->get($this->getEditRoleRoute($role->id));
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollback();
    }

    /** @test */
    public function authenticated_can_see_form_edit_role()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $role = Role::factory()->create();
        $response = $this->get($this->getEditRoleRoute($role->id));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('Admin.role.edit');
        $response->assertSee('Edit Role');
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_update_form_role()
    {
        DB::beginTransaction();
        $role = Role::factory()->create();
        $dataUpdate = Role::factory()->make()->toArray();
        $response = $this->post($this->getUpdateRoleRoute($role->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_update_role()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $role = Role::factory()->create();
        $dataUpdate = Role::factory()->make()->toArray();
        $response = $this->post($this->getUpdateRoleRoute($role->id), $dataUpdate);
        $roleCheck = Role::find($role->id);
        $this->assertSame($roleCheck->name, $dataUpdate['name']);
        $response->assertRedirect($this->getListRoleRoute());
        $response->assertStatus(Response::HTTP_FOUND);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_update_role_if_name_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $role = Role::factory()->create();
        $dataUpdate = Role::factory()->make(['name'=>''])->toArray();
        $response = $this->post($this->getUpdateRoleRoute($role->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['name']);
        DB::rollBack();
    }
}
