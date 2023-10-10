<?php

namespace Tests\Feature;

use App\Models\User;
use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use Route;

    /** @test */
    public function unauthenticated_can_not_see_form_create_user()
    {
        DB::beginTransaction();
        $response = $this->get($this->getCreateUserRoute());
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticated_can_see_form_create_user()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $response = $this->get($this->getCreateUserRoute());
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('Admin.user.add');
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_create_form_user()
    {
        DB::beginTransaction();
        $user = User::factory()->make()->toArray();
        $response = $this->post($this->getStoreUserRoute(), $user);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }

    /** @test */
    public function authenticated_can_store_user()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '123456',
            'passwordAgain' => '123456',
        ];
        $userAfter = User::count();
        $response = $this->post($this->getStoreUserRoute(), $data);
        $userBefore = User::count();
        $this->assertEquals($userAfter + 1, $userBefore);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect($this->getCreateUserRoute());
        DB::rollBack();
    }
    /** @test */
    public function authenticate_can_not_store_user_if_name_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = User::factory()->make(['name'=>''])->toArray();
        $response = $this->post($this->getStoreUserRoute(), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['name']);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_store_user_if_email_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = User::factory()->make(['email'=>''])->toArray();
        $response = $this->post($this->getStoreUserRoute(), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['email']);
        DB::rollBack();
    }

    /** @test */
    public function authenticate_can_not_store_user_if_password_is_null()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $data = User::factory()->make(['password'=>''])->toArray();
        $response = $this->post($this->getStoreUserRoute(), $data);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors(['password']);
        DB::rollBack();
    }
}
