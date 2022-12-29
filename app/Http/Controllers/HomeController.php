<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('category')->get(['id', 'name', 'price', 'slug']);

        return view('frontend.homepage', compact('products'));
    }

    // public function get_products()
    // {
    //     $products = Product::with('category')->get(['id', 'name', 'price', 'slug']);

    //     return response()->json([
    //         'status' => 200,
    //         'products' => $products
    //     ]);
    // }
}
