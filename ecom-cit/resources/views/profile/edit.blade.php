@extends('layouts.admin')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header"><h4>Profile Info Update</h4></div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="form-label">Email:</label>
                    <input type="email" name="email" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header"><h4>Profile Info Update</h4></div>
        <div class="card-body">
            <form action="{{ route('password.update') }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="form-label">Current Password:</label>
                    <input type="password" name="current_password" id="current_password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="form-label"> Password:</label>
                    <input type="password" name="password" id="curren_password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="form-label">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="current_password" class="form-control">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header"><h4>Profile Image Update</h4></div>
        <div class="card-body">
            <form action="{{ route('profile.image') }}" method="post" enctype="multipart/form-data" >
                @csrf
                @if(session('profile'))
                <div class="mb-3">
                    <div class="alert alert-info">
                        {{ session('profile') }}
                    </div>

                </div>

                @endif

                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="" class="form-control">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
