<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\User;

class RatingController extends Controller
{
    public function create($bantuan)
    {
        return view('ratings.create', compact('riwayat'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // dd($request);


        Rating::create([
            'user_id' => $request->id,
            'rating' => $validatedData['rating'],

        ]);

        $user = User::find($request->id);

        if ($user) {
            $ratinglama = $user->rating;
        } else {
            // Tindakan yang diperlukan jika data tidak ditemukan
            $ratinglama = 0;
        }

        $user_rating = Rating::where('user_id', $request -> id) -> count();
        // dd($ratinglama);
        // if ($user_rating > 0) {

        //     $rating = ($ratinglama + $validatedData['rating'])/$user_rating;
        // }

        // $rating = $validatedData['rating'];
        $rating = ($ratinglama + $validatedData['rating'])/$user_rating;



        User::where('user_id', $request -> id) -> update([
            'rating' => $rating
        ]);


        return redirect()-> back() -> with('success', 'Rating berhasil ditambahkan.');
    }
}
