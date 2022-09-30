<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products ,$product;
   public function addView()
   {
       return view('admin.product.add');
   }

    public function newProduct(Request $request)
    {
        Product::addProduct($request);
        return redirect('/add-product')->with('message','Product Save successes');
    }

    public function manageProduct()
    {
       $this->products = Product::all();
//        $this->products = Product::orderBy('id','desc')->get();

        return view('admin.product.manage',['products' => $this->products]);
    }

    public function update($id)
    {
        $this->products = Product::find($id);

        return view('admin.product.update',['products' => $this->products]);
    }

    public function edit(Request $request,$id)
    {
      Product::updateProduct($request,$id);
      return redirect('/manage-product');

    }

    public function delete($id)
    {
        Product::deleteProduct($id);
       return redirect('/manage-product');
    }
}
