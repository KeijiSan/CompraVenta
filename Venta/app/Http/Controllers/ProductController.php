<?php

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Provider;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product ::get();
        return view('admin.product.index',compact('products'));
    }


    public function create()
    {
        $categories = Category ::get();  
        $providers = Provider ::get();        
        return view('admin.product.create',compact('categories','providers'));

    }


    public function Store(StoreRequest $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index');   
    }


    public function show(product $product)
    {
        return view('admin.product.show',compact('products'));
        
    }


    public function edit(product $product)
    {
        $categories = Category ::get();  
        $providers = Provider ::get();    
        return view('admin.product.show',compact('products','categories','providers'));

    }


    public function Update(UpdateRequest $request, product $product)
    {
        $product::update($request->all());
        return redirect()->route('products.index'); 
    }

    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('products.index'); 

    }
}
