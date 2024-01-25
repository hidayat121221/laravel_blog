@extends('layout.master')
@section('title')
    <title>myblog</title>
@stop
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Post</h3>
                        </div>
                        <form action="{{ url('post/'. $posts->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="CategoryName">Select Category</label>
                                        <select class="form-control" name="category_id">
                                            <option selected disabled>Open this select menu</option>
                                            @foreach ($categories as  $category)
                                            <option>{{ $category->name}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="CategoryName">Select SubCategory</label>
                                        <select class="form-control" name="subcategory_id">
                                            <option selected disabled>Open this select menu</option>
                                            @foreach ($subcategories as  $subcategory)
                                            <option>{{ $subcategory->name}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Post title</label>
                                    <input type="text" class="form-control" name="post_title" placeholder="Enter your  post title" value="{{ old('post_title') ?? '' }}">
                                    </div>
                                    @if ($errors->has('post_title'))
                                    <span class="text-danger">{{ $errors->first('post_title') }}</span>
                                    @endif
                                    
                                    <div class="form-group">
                                        <label for="">Short  Description</label>
                                        <textarea class="form-control" name="short_description" id="" cols="30" rows="2" value="{{ old('short_description') ?? '' }}" ></textarea>
                                    </div>
                                    @if ($errors->has('short_description'))
                                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                    @endif
                                    
                                    <div class="form-group">
                                        <label for="">Long Description</label>
                                        <textarea class="form-control" name="long_description" id="" cols="30" rows="4" value="{{ old('long_description') ?? '' }}"></textarea>
                                    </div>
                                    @if ($errors->has('long_description'))
                                        <span class="text-danger">{{ $errors->first('long_description') }}</span>
                                    @endif

                                    <div class="form-group">
                                        <label for="">Auther</label>
                                        <input type="text" class="form-control" name="author" value="{{ old('author') ?? '' }}" >
                                    </div>
                                    @if ($errors->has('author'))
                                        <span class="text-danger">{{ $errors->first('author') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="">image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                  
                                 </div>
                                 <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@stop
