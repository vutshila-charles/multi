<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ['products' => $products];

    }
    public function store(Request $request)
    {
        $product = new Product();
        $request->validate([
            'skuid' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required',
        ]);
        $product->skuid = $request->skuid;
        $product->name = $request->name;
        $product->price = $request->price;
        try {
            $product->save();
            return ['message'  =>'Product Created Successfully'];
        } catch (\Throwable $th) {
            return ['message'  =>'Product Not Created'];
        }
        

    }

    public function show($id)
    {
        $product = Product::find($id);
        return ['product' => $product];

    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'skuid' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required',
        ]);
        $product = Product::find($request->id);
        $product->skuid = $request->skuid;
        $product->name = $request->name;
        $product->price = $request->price;
        try {
            $product->save();
            return ['message'  =>'Product Updated Successfully'];
        } catch (\Throwable $th) {
            return ['message'  =>'Product Not Updated'];
        }
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product){
            try {
                $product->save();
                return ['message'  =>'Product Deleted Successfully'];
            } catch (\Throwable $th) {
                return ['message'  =>'Product Not Deleted'];
            }
        }else{
            return ['message'  =>'Product Not Found'];
        }
    }
}
