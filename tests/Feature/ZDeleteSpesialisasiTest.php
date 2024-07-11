<?php

namespace Tests\Feature;

use App\Models\spesialisasi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteSpesialisasiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_delete_spesialisasi(): void
    {
        $email = User::firstWhere("email", 'nehruiliomar20@gmail.com');

        $user_spesialisasi = [
            'nama_spesialisasi' => 'Elektronik',
            'tingkatan' => 'Profesional',
            'deskripsi_singkat' => 'Kemaren saya benerin layar laptop saya sendiri loo...'
        ];

        $this->actingAs($email)->post('/make_spesialisasi', $user_spesialisasi)->assertRedirectToRoute('profile');

        // Get the ID of the newly created spesialisasi
        $spesialisasi_id = spesialisasi::where('nama_spesialisasi', 'Otomotif')->first();

        // Delete the spesialisasi
        $this->actingAs($email)->delete("/spesialisasi/{$spesialisasi_id->spesialisasi_id}")->assertRedirectToRoute('profile');


        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
