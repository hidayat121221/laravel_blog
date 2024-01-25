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
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">All Categories</h3>
                                            </div>
                                            <!-- ./card-header -->
                                            <div class="card-body">
                                                @include('partials.alert')
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th> category</th>
                                                            <th>Subcategroy</th>
                                                            <th>Post title</th>
                                                            <th>Short Description</th>
                                                            <th>Long Description</th>
                                                            <th>Auther</th>
                                                            <th>Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($post as $item)
                                                        <tr>
                                                            <td>{{ $item['category_id']}}</td>
                                                            <td>{{ $item['subcategory_id']}}</td>
                                                            <td>{{ $item['post_title']}}</td>
                                                            <td>{{ $item['short_description']}}</td>
                                                            <td>{{ $item['long_description']}}</td>
                                                            <td>{{ $item['author']}}</td>
                                                            <td>{{ $item['image']}}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                <form action="{{ route('post.destroy',$item->id) }}"  method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button  class="btn btn-danger delete_btn">Delete</button>
                                                                </form>
                                                                <a href="{{ route('post.edit',$item->id)}}" class= "btn btn-info ml-2">Edit</a>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.row (main row) -->
                                        </div><!-- /.container-fluid -->
                        </section>
                    </div>
                </div>
            </div>
    </section>
@stop
