<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategory=SubCategory::get();
        return view ('subcategory.index', compact('subcategory'));
    }

    public function create()
    {
        // return view('subcategory.create');
        $category= Category::all();
        return view('subcategory.create',compact('category'));
    }

   
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name'=>'required',
            'category_id' => 'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000',
          ]);
        $imageName =time().'.'.$request->image->extension();
        $request->image->move(public_path('Subcategories'),$imageName);
        $subcategory=new SubCategory;
        $subcategory->name=$request->name;
        $subcategory->category_id =$request->category_id;
        $subcategory->image=$imageName;
        $subcategory->save();
        return redirect()->route('subcategory.index');
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
        $category= Category::all();
        $subcategory=SubCategory::where('id',$id)->first();
        return view('subcategory.edit',compact('subcategory','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategory=SubCategory::where('id',$id)->first();
        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('subcategories'),$imageName);
            $subcategory->image=$imageName;
        }
            $subcategory->name = $request->name;
            $subcategory->category_id =$request->category_id;
            $subcategory->save();
            return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = SubCategory::where('id',$id)->first();
        $subcategory->delete();
        return back();
    }
}
