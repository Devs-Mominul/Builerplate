@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header"><h3>Subategory List</h3></div>
        <div class="card-body">
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-lg-6">
                    <div class="card bg-light">
                        <div class="card-header"><h4>{{ $category->category_name }}</h4></div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>name</th>
                                    <th>action</th>

                                </tr>
                                @foreach (App\Models\Subcategory::where('category_id',$category->id)->get() as $sub)
                                <tr>
                                    <td>{{ $sub->subcategory_name }}</td>
                                    <td><a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                </tr>

                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header"><h4>Subcategory</h4></div>
        <div class="card-body">
            <form action="{{ route('subcategory.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="category">Category</label>
                    <select name="category_id" id="" class="form-control">
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name">Subcategory Name</label>
                    <input type="text" name="subcategory_name" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
