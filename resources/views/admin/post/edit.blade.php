
@extends('layouts.admin')
@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route ('post.index')}}">Post List</a></li>
                    <li class="breadcrumb-item active">Edit  Post</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">

                                <h3 class="card-title">Edit Post -> {{$post->title}}</h3>
                                <div>
                                    <a href="{{route ('post.index')}}" button type="button" class="btn btn-primary">Go Back to Post List</a>
                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">


                        <form action="{{route ('post.update',[$post->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <!-- @include('includes.errors') -->
                                        <label for="exampleInputEmail1">Post Title</label>
                                        <input type="text"value="{{ $post->title }}" required name="title" class="form-control" id="title" placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Post Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="" style="display: none;" selected>Select Caterory </option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id  }}" @if($post->category_id == $category->id) selected @endif>{{ $category->name  }}</option>
                                            @endforeach


                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-9">
                                            <label for="image">Image</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>

                                            </div>
                                        
                                            <div class="col-3 text-right">
                                            <div style="max-width: 100px; max-height:100px;overflow:hidden; margin-left:auto">
                                                <img src="{{ asset($post->image) }}" class="img-fluid img-rounded" alt="">
                                            </div>
                                            
                                        </div>
                                            
                                        </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea name="description" id="description" rows="10" class="form-control" placeholder="Enter description">{{$post->description }}</textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            
                        





                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>



@endsection