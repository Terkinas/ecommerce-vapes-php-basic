<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'heading' => 'required|max:255',
                'description' => 'max:1024',
                'rating' => 'required',
            ]);

            if ($request->rating > 5 || $request->rating < 1) {
                return redirect()->route('404');
            }

            Review::create([
                'heading' => request('heading'),
                'description' => request('description'),
                'rating' => request('rating'),

                'user_id' => User::select('id')->where('id', auth()->user()->id)->first()->id,
                'product_id' => $id,
                'accepted' => false,


            ]);

            return redirect()->back()->with('success', 'Thanks for your feedback, it will appear once it is reviewed');
        } catch (\Exception $e) {
            return redirect()->route('404')->with('error', $e);
        }
    }
}
