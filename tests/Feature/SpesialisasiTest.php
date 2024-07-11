<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SpesialisasiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_spesialisasi(): void
    {
        $email = User::firstWhere("email", 'nehruiliomar20@gmail.com');

        $user_spesialisasi = [
            'nama_spesialisasi' => 'Otomotif',
            'tingkatan' => 'Menengah',
            'deskripsi_singkat' => 'Saya bisa memperbaiki tamiya.'
        ];

        $this->actingAs($email)->post('/make_spesialisasi', $user_spesialisasi)->assertRedirectToRoute('profile');


        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
