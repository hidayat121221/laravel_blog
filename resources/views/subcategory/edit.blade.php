@extends('layout.master')
@section('title')
<title>myblog</title>
@stop

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Update Sub Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Sub Categories</li>
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
                        <h3 class="card-title">Update Sub Category</h3>
                    </div>
                    <form action="{{ route('subcategory.update', ['subcategory' => $subcategory->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="CategoryName">Sub Category Name</label>
                                <input type="text" name="name" required class="form-control" id="CategoryName" placeholder="Category Name">
                            </div>
                            <div class="form-group">
                                <label for="CategoryName">Select Sub Category</label>
                                <select class="form-control" name="category_id">
                                    <option selected>Open this select menu</option>
                                    @foreach ($category as  $item)
                                    <option>{{ $item->name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
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