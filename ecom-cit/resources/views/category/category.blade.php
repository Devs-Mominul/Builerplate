@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header"><h4>Category List</h4></div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>category name</th>
                    <th>category photo</th>
                    <th>action</th>
                </tr>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <td>
                        <img src="{{ asset('upload/category/') }}/{{ $category->category_img }}" alt="">
                    </td>
                    <td>
                        <a href="" class="btn btn-danger shadow btn-xs sharp del_btn "><i class="fa fa-trash"></i> Delete</a>
                        <a href="" class="btn btn-primary shadow btn-xs sharp del_btn "><i class="fa fa-edit"></i> Delete</a>
                    </td>
                </tr>

                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Category</div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @if(session('success'))
                <div class="alert alert-info">
                    {{ session('success') }}
                </div>

                @endif
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" name="category_name" class="form-control" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="name">Image:</label>
                    <input type="file" name="image" class="form-control" placeholder="Enter your file">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
