<?php

namespace Tests\Feature;

use App\Models\spesialisasi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReadTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_read_spesialisasi(): void
    {
        $user_login = [
            'email' => 'igoputra@gmail.com',
            'password' => 'igo12345'
        ];

        $this->post("/authenticate", $user_login)-> assertRedirect('/');

        $response = $this->get('/');

        $response->assertStatus(200);

        $user = User::where('email', 'igoputra@gmail.com');

        $response = $this->actingAs($user)->get("/course");

        $response->assertStatus(200);

    }
}
