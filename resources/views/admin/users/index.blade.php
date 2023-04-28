@extends('welcome')

@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Books</a></li>
        <li class="breadcrumb-item active" aria-current="page">User</li>
    </ol>
</nav>
<!-- /Breadcrumb -->
<div class="container-fluid px-xxl-65 px-xl-20">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Users</h4>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <table id="datable_1" class="table table-hover w-100 display pb-30 bg-green">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Phone No</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="bg-green">
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td><img src="{{asset('storage/user_images/'.$user->image)}}" style="width: 25%;"></td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->password}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->role->name}}</td>
                                            <td>
                                                <form action="{{ url('users/' . $user->id) }}" method="post">
                                                @csrf @method('delete')
                                                    <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit text-dark"></i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o text-dark"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->

</div>
@endsection
