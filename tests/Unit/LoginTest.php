<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Test if email is required
     */
    public function test_email_is_required()
    {
        $data = [
            'email' => '',
            'password' => 'my_password'
        ];

        $response = $this->postJson('api/auth/login', $data);

        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson(fn(AssertableJson $json) => 
                $json->has('message')
                    ->where('success', false)
                    ->etc()
            );
    }

    /**
     * Test if password is required
     */
    public function test_password_is_required()
    {
        $data = [
            'email' => 'myemail@email.com',
            'password' => ''
        ];

        $response = $this->postJson('api/auth/login', $data);

        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson(fn(AssertableJson $json) => 
                $json->has('message')
                    ->where('success', false)
                    ->etc()
            );
    }

    /**
     * Test if can validate min password lenght
     */
    public function test_validate_password_min_lenght()
    {
        $user = User::factory()
            ->create();

        $data = [
            'email' => $user->email,
            'password' => "12345"
        ];

        $response = $this->postJson('api/auth/login', $data);

        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson(fn(AssertableJson $json) => 
                $json->has('message')
                    ->where('success', false)
                    ->etc()
            );
    }

    /**
     * Test if can validate max password lenght
     */
    public function test_validate_password_max_lenght()
    {
        $user = User::factory()
            ->create();

        $data = [
            'email' => $user->email,
            'password' => "12345789123456789123456789"
        ];

        $response = $this->postJson('api/auth/login', $data);

        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson(fn(AssertableJson $json) => 
                $json->has('message')
                    ->where('success', false)
                    ->etc()
            );
    }

    /**
     * Test if can validate email and password
     */
    public function test_validate_email_and_password()
    {
        $user = User::factory()
            ->create();

        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'badPassword',
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJson(fn(AssertableJson $json) => 
                $json->where('success', false)
                    ->etc()
        );
    }
}
