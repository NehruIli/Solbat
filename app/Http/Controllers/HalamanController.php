<?php

namespace App\Http\Controllers;

use App\Models\bantuan;
use App\Models\Contact;
use App\Models\penawaran_bantuan;
use App\Models\spesialisasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HalamanController extends Controller
{
    // function welcome()
    // {
    //     $jumlah_bantuan = bantuan::all()->count();

    //     $jumlah_penawaran = penawaran_bantuan::all()->count();

    //     $jumlah_bantuan_user = bantuan::where('user_id', Auth::user()->user_id)->count();

    //     $jumlah_penawaran_user = penawaran_bantuan::where('user_id', Auth::user()->user_id)->count();

    //     return view("welcome", compact('jumlah_bantuan', 'jumlah_penawaran', 'jumlah_bantuan_user', 'jumlah_penawaran_user'));
    // }

    function about()
    {
        return view("about");
    }
    function course(Request $request)
    {
        $data = bantuan::select();
        $spesialisasi = spesialisasi::all();

        if(request('search')){
            $data->where('jenis_bantuan', 'like', '%'.request('search').'%');
        }
        $data = $data->where('status', 'Pending');

        $belumDitawar = bantuan::all();
        // dd($data);
        $bantuan = bantuan::paginate(6);
        return view("course", [
            'data' => $data->get(),
            'active' => 'course',
        ], compact('spesialisasi'));
    }
    function detail()
    {
        $data = bantuan::where('bantuan_id')->first();
        return view("detail");
    }
    public function contact()
    {
        return view("contact");
    }
    public function make_course()
    {
        return view("make_course");
    }
    public function make_penawaran($id)
    {
        $data = bantuan::where('bantuan_id',$id)->first();
        return view("make_penawaran", ['data'=>$data]);
    }

    public function profile()
    {
        $spesialisasi = spesialisasi::all();
        $bantuan = bantuan::with('user')->where('user_id', Auth::user()->user_id)->get();
        return view("profile",compact('spesialisasi', 'bantuan'));
    }
    public function agent()
    {
        $dataAgent = User::all();
        return view("agent", ['dataAgent' => $dataAgent]);
    }
    public function agent_detail($id)
    {
        $spesialisasi = spesialisasi::all();
        $agent = User::find($id);
        return view("agent_detail",compact('spesialisasi','agent'));
    }

    public function cekDetail($id){
    $data = bantuan::where('bantuan_id', $id)->first();
    if(!$data){
        return redirect()->route('detail');
    }
    return view('detail', ['data' => $data,'id'=>$id]);
    }

    public function make_spesialisasi()
    {

        return view("make_spesialisasi");
    }
    public function update_spesialisasi($id)
    {
        $spesialisasi = spesialisasi::find($id);
        return view("update_spesialisasi",compact('spesialisasi'));
    }
    public function admin_dasboard()
    {
        $bantuan = bantuan::all();
        $spesialisasi = spesialisasi::all();
        $contact = Contact::all();
        $bulanan = bantuan::whereMonth('updated_at', '=', Carbon::now())->whereYear('updated_at', '=', Carbon::now())->get();
        $harian = bantuan::whereDate('updated_at', '=', Carbon::now())->whereYear('updated_at', '=', Carbon::now())->get();
        return view("admin_dasboard",compact('harian', 'bulanan','bantuan', 'spesialisasi','contact'));

    }
    public function edit_spesialisasi()
    {
        $spesialisasi = spesialisasi::all();
        return view("edit_spesialisasi",compact('spesialisasi'));

    }
    public function riwayat()
    {
        $bantuan_id = bantuan::where('user_id', Auth::user()->user_id)->pluck('bantuan_id')->toArray();
        $bantuan = bantuan::all();
        $penawaran = penawaran_bantuan::with(['bantuan', 'user'])->whereIn('bantuan_id', $bantuan_id)->get();
        // dd($penawaran->first()->bantuan_id);
        return view("riwayat",compact('bantuan', 'penawaran'));
    }

    public function riwayat_bulanan()
    {
        $bulanan = bantuan::whereMonth('updated_at', '=', Carbon::now())->whereYear('updated_at', '=', Carbon::now())->where('user_id', '=', Auth::user()->id)->get();
        dd($bulanan);
        return view("admin_dasboard", compact('bantuan'));
    }

}
