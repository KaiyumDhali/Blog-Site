<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class HomeController extends Controller
{
    private $products;
    public function index()
    {
        $this->products = Product::all();
//        $this->products = Product::orderBy('id','desc')->get();
        return view('website.home.index',['products'=>$this->products]);
    }

    public function details($id)
    {
        $this->products = Product::find($id);
        return view('website.product.single-product',['products'=>$this->products]);
    }
}
