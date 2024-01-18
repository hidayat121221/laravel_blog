<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::get();
        return view ('category.index', compact('category'));
    }

    /**
     * Show the form for creating a return view('category.index');new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageName =time().'.'.$request->image->extension();
        $request->image->move(public_path('categories'),$imageName);
        $category=new Category;
        $category->name=$request->name;
        $category->image=$imageName;
        $category->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::where('id',$id)->first();
        return view('category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category=Category::where('id',$id)->first();
        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('categories'),$imageName);
            $category->image=$imageName;
        }
            $category->name = $request->name;
            $category->save();
            return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::where('id',$id)->first();
        $category->delete();
        return back();
    }
}
