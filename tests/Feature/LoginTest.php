<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\UserPermission;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if can login
     */
    public function test_login()
    {
        $user = User::factory()
            ->has(UserPermission::factory(5))
            ->create();

        $data = [
            'email' => $user->email,
            'password' => 'password',
        ];
            
        $response = $this->postJson('/api/auth/login', $data);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(fn(AssertableJson $json) => 
                $json->where('success', true)
                    ->has('data')
                    ->has('data.token')
                    ->where('data.email', $user->email)
                    ->etc()
            );
    }
}
