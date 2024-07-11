<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
        $user_login = [
            'email' => 'igoputra@gmail.com',
            'password' => 'igo12345'
        ];

        $this->post("/authenticate", $user_login)-> assertRedirect('/');

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
