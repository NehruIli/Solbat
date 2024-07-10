<?php

namespace App\Http\Controllers;

use App\Models\penawaran_bantuan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\bantuan;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Fungsi Untuk Login
     */
    public function login(Request $request){
        return view('login');
    }

    public function bantuan(Request $request){
        return view('bantuan');
    }

    public function showRegister(){
        return view('register');
    }


    public function register(Request $request){
        // dd($request);

        $validated = Validator::make($request->all(), [
            'password' => 'required|min:4|max:255',
            'email' => 'required',
            'no_telepon' => 'required|max:13'
        ]);

         if ($validated->fails()) {
            return response()->json($validated->errors(), 422);
        }

        $t = User::create([
            'username' => $request->nama_depan,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'NIK' => $request->NIK,
            'spesialisasi' => "Tes",
            'pekerjaan' => $request->pekerjaan,
            'img_user' => $request->file('img_user')->store('profile'),

        ]);


        return redirect()->route('login');

    }

    public function show(Request $request){
        // return 'Id = '.$request->input('id');
        $all = bantuan::all();
        // dd($all);
        return view(
            'bantuan',
            [
                'all' => $all
            ]
        );
    }

    public function authenticate(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required|min:4|max:255',
        ]);

        if(!Auth::attempt($validated)){
            return back()->withErrors('Username/password salah');
        }
        // dd($test);
        return redirect()->route('welcome');
    }

    public function welcome(Request $request){
        $username = Auth::User();
        $jumlah_bantuan = bantuan::all()->count();

        $jumlah_penawaran = penawaran_bantuan::all()->count();

        $jumlah_penawaran_user = 0;

        $jumlah_bantuan_user = 0;
        // $jumlah_bantuan_user = 0;

        if(Auth::user()){
            $jumlah_bantuan_user = bantuan::where('user_id', Auth::user()->user_id)->count();

            $jumlah_penawaran_user = penawaran_bantuan::where('user_id', Auth::user()->user_id)->count();
        }


        return view("welcome", compact('jumlah_bantuan', 'jumlah_penawaran', 'jumlah_bantuan_user', 'jumlah_penawaran_user'));
        // dd($username);
        // return view('welcome', ['username' => $username]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
    public function submit_profile(Request $request, string $id){
        $validated = $request->validate([
            'no_telepon' => 'required',
            'alamat' => 'required|min:4|max:255',
            'kemampuan_detail' => 'required',
        ]);
        // dd($username);
        $profile = User::where('user_id', $id)->update($validated);
        return redirect()->route('profile');
    }

    public function data_agent()
    {
    $dataAgent = User::all();
    }


}
