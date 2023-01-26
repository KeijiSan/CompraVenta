<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category ::get();
        return view('admin.category.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');

    }


    public function Store(StoreRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('categories.index');   
    }


    public function show(category $category)
    {
        return view('admin.category.show',compact('categories'));
        
    }


    public function edit(category $category)
    {
        return view('admin.category.show',compact('categories'));

    }


    public function Update(UpdateRequest $request, category $category)
    {
        $category::update($request->all());
        return redirect()->route('categories.index'); 
    }

    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('categories.index'); 

    }
}
