
@extends('layouts.admin')
@section ('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Tag</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route ('website')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route ('tag.index')}}">TagList</a></li>
                    <li class="breadcrumb-item active">Create Tag</li>
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

                                <h3 class="card-title">Create Tag</h3>
                                <div>
                                    <a href="{{route ('tag.index')}}" button type="button" class="btn btn-primary">Go Back to Tag List</a>
                                </div>

                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <form action="{{route ('tag.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                    @include('includes.errors')
                                        <label for="exampleInputEmail1">TagName</label>
                                        <input type="name" name="name" class="form-control" id="name" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea name="description" id="description" rows="10" class="form-control" placeholder="Enter description"></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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