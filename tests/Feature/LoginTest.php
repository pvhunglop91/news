<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use App\Traits\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class Login extends TestCase
{
    use Route;
    /** @test */
    public function test_user_can_see_form_login()
    {
        $response = $this->get($this->getFormLoginRoute());
        $response->assertSee('Sign in');
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function test_user_can_login()
    {
        DB::beginTransaction();
        $password = 12345678;
        $user = User::factory([
            'password' => Hash::make($password)
        ])->create();
        $response = $this->post($this->getLoginRoute(), [
            'email' => $user->email,
            'password' => $password
        ]);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('homepage');
        DB::rollBack();
    }

    /** @test */
    public function test_user_can_not_login_if_email_null()
    {
        DB::beginTransaction();
        $password = 12345678;
        $user = User::factory([
            'password' => Hash::make($password)
        ])->create();

        $response = $this->post($this->getLoginRoute(), [
            'email' => '',
            'password' => $password
        ]);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors('email');
        DB::rollBack();
    }

    /** @test */
    public function test_user_can_not_login_if_password_null()
    {
        DB::beginTransaction();
        $user = User::factory([
            'password' => ''
        ])->create();

        $response = $this->post($this->getLoginRoute(), [
            'email' => $user->email,
            'password' => ''
        ]);
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors('password');
        DB::rollBack();
    }
}
