<?php

// app/Http/Controllers/PriceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        return view('price.index');
    }

    public function calculate(Request $request)
    {
        $originalPrice = $request->input('originalPrice');
        $sellPrice = $request->input('sellPrice');
        $discount = $request->input('discount');

        $discountedPrice = $originalPrice - ($originalPrice * ($discount / 100));

        return view('price.result', [
            'discountedPrice' => $discountedPrice,
            'savings' => $originalPrice - $discountedPrice,
        ]);
    }
}

