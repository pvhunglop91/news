<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use App\Traits\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class RegisterTest extends TestCase
{
    use Route;

    /** @test */
    public function test_user_can_see_form_register()
    {
        $response = $this->get($this->getFormRegisterRoute());
        $response->assertViewIs('pages.registration');
        $response->assertSee('Sign Up');
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function test_user_can_register()
    {
        DB::beginTransaction();
        $password = 12345678;
        $user = User::factory([
            'password' => Hash::make($password)
        ])->create();
        $response = $this->post($this->getRegisterRoute(), [
            'email' => $user->email,
            'password' => $password,
            'name' => $user->name,
        ]);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect($this->getRedirectRegisterRoute());
        DB::rollBack();
    }

    /** @test */
    public function test_user_can_not_register_if_name_is_null()
    {
        DB::beginTransaction();
        $password = 12345678;
        $user = User::factory([
            'password' => Hash::make($password)
        ])->create();
        $response = $this->post($this->getRegisterRoute(), [
            'email' => $user->email,
            'password' => $password,
            'name' => '',
        ]);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors('name');
        DB::rollBack();
    }

    /** @test */
    public function test_user_can_not_register_if_email_is_null()
    {
        DB::beginTransaction();
        $password = 12345678;
        $user = User::factory([
            'password' => Hash::make($password)
        ])->create();
        $response = $this->post($this->getRegisterRoute(), [
            'email' => '',
            'password' => $password,
            'name' => $user->name,
        ]);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors('email');
        DB::rollBack();
    }

    /** @test */
    public function test_user_can_not_register_if_password_is_null()
    {
        DB::beginTransaction();
        $user = User::factory()->create();
        $response = $this->post($this->getRegisterRoute(), [
            'email' => $user->email,
            'password' => '',
            'name' => $user->name,
        ]);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors('password');
        DB::rollBack();
    }
}
