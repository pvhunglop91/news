<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DeleteRoleTest extends TestCase
{
    use Route;

    /** @test */
    public function authenticate_can_delete_role()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $role = Role::factory()->create();
        $countRoleBefore = Role::count();
        $response = $this->get($this->getDestroyRoleRoute($role->id));
        $countRoleAfter = Role::count();
        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertEquals($countRoleBefore - 1, $countRoleAfter);
        $this->assertDatabaseMissing('roles', $role->toArray());
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_delete_role()
    {
        DB::beginTransaction();
        $role = Role::factory()->create();
        $response = $this->get($this->getDestroyRoleRoute($role->id));
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }
}
