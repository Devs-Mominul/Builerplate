@extends('layouts.admin')
@section('content')
<div class="col-lg-8"></div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Brand</div>
        <div class="card-body">
            <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="mb-3">
                    <label for="name">Brand Name:</label>
                    <input type="text" name="brand_name" id="name" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="name">Brand Name:</label>
                    <input type="file" name="image" id="name" class="form-control" >
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
