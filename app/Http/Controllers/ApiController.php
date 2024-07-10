<?php

namespace App\Http\Controllers;

use App\Models\bantuan;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getBantuans(){
        $bantuan = Bantuan::all();

        return response()->json([
            'status' => 'ok',
            'data' => $bantuan
        ]);
    }

    public function getUsers(){
        $user = User::all();

        return response()->json([
            'status' => 'ok',
            'data' => $user

        ]);
    }

   public function hehe(){
    $bantuan = bantuan::get();
    return response()->json($bantuan);
   }

   public function detail(Request $request){
    $bantuan = bantuan::findOrfail($request->id);
    return response()->json($bantuan);
   }

   public function add_sample(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|max:100',
            'durasi' => 'required|max:15',
            'jenis_durasi' => 'required|max:    '
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }

        $obj = new Sample;
        $obj->name = $request->input('name');
        $obj->hp = $request->input('hp');
        $obj->save();

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
