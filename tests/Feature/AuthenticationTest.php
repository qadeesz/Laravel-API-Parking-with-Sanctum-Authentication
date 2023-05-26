<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{

    use RefreshDatabase;
    
    public function testUserCanLoginCorrectCerdentials(){
        $user = User::factory()->create();

        // dd($user);

        $response = $this->postJson('/api/v1/auth/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(201);
    }

    public function testUserCannotLoginWithIncorrectCredentials(){
        $user = User::factory()->create();

        $response = $this->postJson('/api/v1/auth/login',[
            'email' => $user->email,
            'password' => 'wrong password',
        ]);

        $response->assertStatus(422);
    }
}
