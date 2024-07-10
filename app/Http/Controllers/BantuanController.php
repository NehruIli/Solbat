<?php

namespace App\Http\Controllers;

use App\Models\bantuan;
use App\Models\penawaran_bantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class BantuanController extends Controller
{
    public function submit(Request $request){

        // dd($request);
        $validated = $request->validate([
            'bantuan' => 'required|min:4|max:255',
            'jenis_bantuan' => 'required',
            'detail_bantuan' => 'required',
            'durasi' => 'required',
            'jenis_durasi' => 'required',
            'almt_bantuan' => 'required',
            'biaya' => 'required',
            'img_bantuan' => 'required|image|file',
        ]);

        $validated['user_id'] = Auth::user()->user_id;
        $validated['img_bantuan'] = $request->img_bantuan->store('gambar-bantuan');

        // dd($validated);
        $t = bantuan::create($validated);

        return redirect()->route('bantuan');
    }

    public function submit_penawaran(Request $request){
        // dd($request);

        $validated = $request->validate( [
            'biaya_penawaran' => 'required',

        ]);

        $validated['user_id'] = Auth::user()->user_id;

        $validated['bantuan_id'] =$request->bantuan_id;



        $t = penawaran_bantuan::create($validated);

        return redirect()->route('bantuan');
    }

    public function history_bantuan(Request $request){
        $bantuan = bantuan::where('status', 'Pending')->get();
        return view("profile",compact('bantuan'));

    }


}
