<?php

namespace App\Http\Controllers;

use App\Models\bantuan;
use App\Models\penawaran_bantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function approval(Request $request){
        // dd(Auth::user()->user_id);
        $bantuan = bantuan::where('user_id',Auth::user()->user_id)->pluck('bantuan_id')->toArray();
        $penawaran = penawaran_bantuan::whereIn('bantuan_id', $bantuan)->where('status', 'Pending')->get();
        return view("approval",compact('penawaran'));

    }

    public function approved($id){
        $penawaran = penawaran_bantuan::where('penawaran_bantuan_id', $id)->first();
        // dd($bantuan);
        $penawaran->update([
            'status' => 'Approved'
        ]);

        $bantuan = bantuan::where('bantuan_id', $penawaran->bantuan_id)->first();
        $bantuan->update([
            'status' => 'Approved'
        ]);

        // $bantuan -> status = "Approved";

        // $bantuan -> save();

        return redirect()->route('approval');
    }

    public function reject($id){
        $penawaran = penawaran_bantuan::where('penawaran_bantuan_id', $id)->first();
        // dd($bantuan);
        $penawaran->update([
            'status' => 'Reject'
        ]);

        $bantuan = bantuan::where('bantuan_id', $penawaran->bantuan_id)->first();
        $bantuan->update([
            'status' => 'Reject'
        ]);

        return redirect()->route('approval');
    }
}
