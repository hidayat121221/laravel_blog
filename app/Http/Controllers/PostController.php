<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Category;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //    return view('post.index');
    $post=Post::get();
    return view ('post.index', compact('post'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $subcategories = SubCategory::get();
        return view('post.create', compact('categories','subcategories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'post_title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('posts'), $imageName);
        $post = new Post;
        $post->category_id=$request->category_id;
        $post->subcategory_id=$request->subcategory_id;
        $post->post_title = $request->post_title;
        $post->short_description = $request->short_description;
        $post->long_description = $request->long_description;
        $post->	author = $request->author;
        $post->	image = $imageName;
        $post->save();
        return redirect()->route('post.index')->withCreate('blog posted successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories= Category::all();
        $subcategories= SubCategory::all();
        $posts=Post::where('id',$id)->first();
        return view('post.edit',compact('posts','categories','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post=Post::where('id',$id)->first();
        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('subcategories'),$imageName);
            $post->image=$imageName;
        }
            $post->category_id=$request->category_id;
            $post->subcategory_id=$request->subcategory_id;
            $post->post_title = $request->post_title;
            $post->short_description = $request->short_description;
            $post->long_description = $request->long_description;
            $post->	author = $request->author;
            $post->save();
            return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posts = Post::where('id',$id)->first();
        $posts->delete();
        return back();
    }
}
