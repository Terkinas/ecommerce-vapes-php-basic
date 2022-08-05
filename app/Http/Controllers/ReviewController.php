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
                'accepted',
                'user_id',
                'product_id',
            ]);



            Review::create([
                'heading' => request('heading'),
                'description' => request('description'),

                'user_id' => User::select('id')->where('id', auth()->user()->id)->first()->id,
                'product_id' => $id,
                'accepted' => false,


            ]);

            return redirect()->route('products.index');
        } catch (\Exception $e) {
            return redirect()->route('404')->with('error', $e);
        }
    }
}
