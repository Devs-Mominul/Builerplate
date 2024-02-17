@extends('layouts.admin')
@section('content')
<div class="col-lg-10 mx-auto">
    <div class="card">
        <div class="card-header"><h4>User List</h4></div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>sl</th>
                    <th>name</th>
                    <th>email</th>
                    <td>photo</td>
                    <th>action</th>
                </tr>
                @foreach ($user_list as $list)
                <tr>
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->name }}</td>
                    <td>{{ $list->email }}</td>
                    @if($list->photo==null)
                    <td>
                        <img src="{{ Avatar::create($list->name)->toBase64() }}"  width="20px" />
                    </td>

                    @else
                    <td>
                        <img src="{{ asset('upload/profile/') }}/{{ $list->photo }}" alt="" width="20px">
                    </td>

                    @endif

                    <td><button data-link="{{ route('user.delete',$list->id) }}" class="btn btn-danger shadow btn-xs sharp del_btn "><i class="fa fa-trash" ></i></button></td>
                </tr>

                @endforeach
            </table>
        </div>
    </div>
</div>
@push('backend_js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.del_btn').click(function(){
       var  $data_link=$(this).attr('data-link');


        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=$data_link;

            }
          });

    })
</script>

@endpush
@if(session('delete'))
<script>
    Swal.fire({
        title: "Deleted!",
        text: "{{ session('delete') }}.",
        icon: "success"
      });
</script>

@endif


@endsection
