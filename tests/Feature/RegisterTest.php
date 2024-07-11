<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_register(): void
    {
        $user_register = [
            'nama_depan' => 'igo',
            'nama_belakang' => 'putra',
            'email' => 'igoputra@gmail.com',
            'password' => 'igo12345',
            'NIK' => '1234567890123456',
            'no_telepon' => '081123456789',
            'pekerjaan' => 'mahasiswa',
            'alamat' => 'Jepara',
            'img_user' => $file = UploadedFile::fake()->image('post.jpg')
        ];

        $this->post("/register", $user_register)-> assertRedirect('/login');
        $this->assertDataBaseHas('users', ['nama_depan'=>'igo']);

        $cek_user = User::where('nama_depan', $user_register['nama_depan']);
        $cek_user->delete();





        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
