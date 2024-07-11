<?php

namespace Tests\Feature;

use App\Models\spesialisasi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateSpesialisasiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_update_Spesialisasi(): void
    {
        $email = User::firstWhere("email", 'nehruiliomar20@gmail.com');

        $user_spesialisasi = [
            'nama_spesialisasi' => 'Otomotif',
            'tingkatan' => 'Menengah',
            'deskripsi_singkat' => 'Saya bisa memperbaiki tamiya.'
        ];

        $this->actingAs($email)->post('/make_spesialisasi', $user_spesialisasi)->assertRedirectToRoute('profile');
        // Get the ID of the newly created spesialisasi
        $spesialisasi_id = spesialisasi::where('nama_spesialisasi', 'Otomotif')->first();

        // Update the spesialisasi
        $updated_spesialisasi_data = [
            'nama_spesialisasi' => 'Elektronik',
            'tingkatan' => 'Profesional',
            'deskripsi_singkat' => 'Kemaren saya benerin layar laptop saya sendiri loo...'
        ];

        $this->actingAs($email)->put("/spesialisasi/{$spesialisasi_id->spesialisasi_id}", $updated_spesialisasi_data)->assertRedirectToRoute('profile');

        // Assert that the spesialisasi has been updated
        $updated_spesialisasi = Spesialisasi::find($spesialisasi_id->spesialisasi_id);
        $this->assertEquals('Elektronik', $updated_spesialisasi->nama_spesialisasi);
        $this->assertEquals('Profesional', $updated_spesialisasi->tingkatan);
        $this->assertEquals('Kemaren saya benerin layar laptop saya sendiri loo...', $updated_spesialisasi->deskripsi_singkat);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
