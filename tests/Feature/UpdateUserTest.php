<?php

namespace Tests\Feature;

use App\Models\User;
use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
    use Route;

    /** @test */
    public function unauthenticated_can_not_see_form_edit_user()
    {
        DB::begintransaction();
        $user = User::factory()->create();
        $response = $this->get($this->getEditUserRoute($user->id));
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollback();
    }

    /** @test */
    public function authenticated_can_see_form_edit_user()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $user = User::factory()->create();
        $response = $this->get($this->getEditUserRoute($user->id));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('Admin.user.edit');
        $response->assertSee('Edit User');
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_update_form_user()
    {
        DB::beginTransaction();
        $user = User::factory()->create();
        $dataUpdate = User::factory()->make()->toArray();
        $response = $this->post($this->getUpdateUserRoute($user->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_update_user()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $user = User::factory()->create();
        $dataUpdate = User::factory()->make()->toArray();
        $response = $this->post($this->getUpdateUserRoute($user->id), $dataUpdate);
        $userCheck = User::find($user->id);
        $this->assertSame($userCheck->name, $dataUpdate['name']);
        $response->assertRedirect($this->getListUserRoute());
        $response->assertStatus(Response::HTTP_FOUND);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_update_user_if_name_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $user = User::factory()->create();
        $dataUpdate = User::factory()->make(['name'=>''])->toArray();
        $response = $this->post($this->getUpdateUserRoute($user->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['name']);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_update_user_if_email_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $user = User::factory()->create();
        $dataUpdate = User::factory()->make(['email'=>''])->toArray();
        $response = $this->post($this->getUpdateUserRoute($user->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['email']);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_update_user_if_password_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $user = User::factory()->create();
        $dataUpdate = User::factory()->make(['password'=>''])->toArray();
        $response = $this->post($this->getUpdateUserRoute($user->id), $dataUpdate);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['password']);
        DB::rollBack();
    }
}
