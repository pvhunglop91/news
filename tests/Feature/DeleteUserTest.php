<?php

namespace Tests\Feature;

use App\Models\User;
use App\Traits\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{
    use Route;

    /** @test */
    public function authenticate_can_delete_user()
    {
        DB::beginTransaction();
        $this->login(["Admin"]);
        $user = User::factory()->create();
        $countUserBefore = User::count();
        $response = $this->get($this->getDestroyUserRoute($user->id));
        $countUserAfter = User::count();
        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertEquals($countUserBefore - 1, $countUserAfter);
        $this->assertDatabaseMissing('users', $user->toArray());
        DB::rollBack();
    }

    /** @test */
    public function unauthenticated_can_not_delete_user()
    {
        DB::beginTransaction();
        $user = User::factory()->create();
        $response = $this->get($this->getDestroyUserRoute($user->id));
        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertRedirect('/admin/login');
        DB::rollBack();
    }
}
