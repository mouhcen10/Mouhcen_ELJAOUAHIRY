<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::orderBy('created_at', 'desc')->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchWithCategory(Request $request)
    {
        $category = trim($request->get('category'));

        if ($category) {
            $products = Product::where('category_id', '=', $category)
                                ->orderBy('created_at', 'desc')
                                ->paginate(4);
        }
        
        return view('products.index', [
            'products' => $products
        ]);
        
    }

    public function searchWithPrice(Request $request)
    {
        $validated = $request->validate([
            'search' => 'required|numeric'
        ]);

        $price = trim($request->get('search'));
        
        if ($price && $validated) {
            $products = Product::where('price', '=', $price)
                                ->orderBy('created_at', 'desc')
                                ->paginate(4);
        }
        
        return view('products.index', [
            'products' => $products
        ]);
        
    }
}
