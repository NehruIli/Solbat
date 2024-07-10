<?php

namespace App\Http\Controllers;

use App\Models\bantuan;
use App\Models\spesialisasi;
use Illuminate\Http\Request;

class SpesialisasiController extends Controller
{
    public function submit_spesialisasi(Request $request){
        // dd($request);

        $validated = $request->validate( [
            'nama_spesialisasi' => 'required',
            'tingkatan' => 'required',
            'deskripsi_singkat' => 'required',
        ]);

        spesialisasi::create($validated);

        return redirect()->route('profile');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_spesialisasi' => 'required',
            'tingkatan' => 'required',
            'deskripsi_singkat' => 'required',
        ]);

        $spesialisasi = Spesialisasi::find($id);

        if (!$spesialisasi) {
            return response()->json(['message' => 'Spesialisasi tidak ditemukan'], 404);
        }

        $spesialisasi->nama_spesialisasi = $request->nama_spesialisasi;
        $spesialisasi->tingkatan = $request->tingkatan;
        $spesialisasi->deskripsi_singkat = $request->deskripsi_singkat;

        $spesialisasi->save();

        return redirect()->route('profile')->with('success', 'Spesialisasi berhasil diperbarui');
    }

    public function delete($id)
    {
        $spesialisasi = Spesialisasi::find($id);

        if (!$spesialisasi) {
            return redirect()->route('spesialisasi.index')->with('error', 'Spesialisasi tidak ditemukan');
        }

        $spesialisasi->delete();

        return redirect()->route('spesialisasi.index')->with('success', 'Spesialisasi berhasil dihapus');
    }


    public function create()
    {

    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_spesialisasi' => 'required',
            'tingkatan' => 'required',
            'deskripsi_singkat' => 'required',
        ]);

        Spesialisasi::create([
            'nama_spesialisasi' => $request->nama_spesialisasi,
            'tingkatan' => $request->tingkatan,
            'deskripsi_singkat' => $request->deskripsi_singkat,
        ]);

        return redirect()->route('profile')->with('success', 'Spesialisasi berhasil ditambahkan.');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        $spesialisasi = spesialisasi::find($id);
        // dd($spesialisasi);
        return view("update_spesialisasi",compact('spesialisasi'));
    }

    public function destroy(string $id)
    {
        $spesialis = spesialisasi::findOrFail($id);
        $spesialis->delete();

        return redirect()->route('profile');
    }
    public function search(Request $request)
    {
        $spesialisasi = $request->input('spesialisasi');

        $query = spesialisasi::query();

        if ($spesialisasi) {
            $query->where('specialist', $spesialisasi);
        }

        $doctors = $query->get();

        return view('course', compact('doctors'));
    }

    public function filter(Request $request)
{
    $spesialisasiId = $request->input('spesialisasi_id');

    $data = ($spesialisasiId)
        ? bantuan::whereHas('spesialisasi', function ($query) use ($spesialisasiId) {
            $query->where('spesialisasi_id', $spesialisasiId);
        })->get()
        : bantuan::all();

    $spesialisasi = Spesialisasi::all();

    dd($spesialisasi);

    return view('bantuan', compact('data', 'spesialisasi'));
}

}
