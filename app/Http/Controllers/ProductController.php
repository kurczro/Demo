<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('products',compact('products'));
    }

    public function addProduct(Request $request)
    {
        $product = new Product();
        $product->pname = $request->pname;
        $product->mname = $request->mname;
        $product->save();
        return response()->json($product);
    }

    public function getProductById($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function updateProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product->pname = $request->pname;
        $product->mname = $request->mname;
        $product->save();
        return response()->json($product);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json(['success'=>'Product has been deleted']);
    }
}
