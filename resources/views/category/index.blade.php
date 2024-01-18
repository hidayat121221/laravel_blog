@extends('layout.master')
@section('title')
    <title>myblog</title>
@stop

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Categories</h1>
                    </div><!-- /.col -->
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Categories</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>IMAGE</th>
                                            <th>created_at</th>
                                            <th>updated_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $item)
                                        <tr>
                                            <td>{{ $item['id']}}</td>
                                            <td>{{ $item['name']}}</td>
                                            
                                            <td>
                                                <img src="{{ asset('categories/'.$item->image) }}" alt="" class="rounded-circle" width="50px" height="50px">
                                            </td>
                                            <td>{{ $item['created_at']}}</td>
                                            <td>{{ $item['updated_at']}}</td>
                                            <td>
                                                <div class="btn-group">
                                                <form action="{{ route('category.destroy',$item->id) }}"  method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  class="btn btn-danger delete_btn">Delete</button>
                                                </form>
                                                <a href="{{ route('category.edit',$item->id)}}" class= "btn btn-info ml-2">Edit</a>
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
@stop
