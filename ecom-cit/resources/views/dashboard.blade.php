@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header"><h1>Admin Panel</h1></div>
        <div class="card-body">
            <h3>Welcome To  <span class="text-success">{{ Auth::user()->name }}</span> in Dashboard</h3>
        </div>
    </div>
</div>

@endsection
