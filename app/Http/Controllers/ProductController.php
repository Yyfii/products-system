<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    public function list(){
        $products = Product::orderBy('price')->get();
        return view('products.list', ['products'=> $products]);
    }



    //This method will show the create page
    public function create(){
        return view('products.create');
    }


    //This method will insert a new product
    public function store(Request $request){
        
        $data = $request->validate([
            'name'=> 'required|min:3',
            'description' => 'required|min:3',
            'price' => 'required|decimal:2',
            'disp' => 'required',
        ]);
        $newProduct = Product::create($data);
        return redirect(route('product.list'));

    }



    //This method will show the edit page
    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }


    //This method will update a product
    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name'=> 'required|min:3',
            'description' => 'required|min:3',
            'price' => 'required|decimal:2',
            'disp' => 'required',
        ]);
        $product->update($data);
        return redirect(route('product.list'))->with('success', 'Product Updated Succesffully');
    }

    
    //This method will delete a product
    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.list'))->with('success', 'Product deleted Succesffully');
    }
}
