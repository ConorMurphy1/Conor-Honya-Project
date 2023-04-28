@extends('welcome')
@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Books</a></li>
        <li class="breadcrumb-item active" aria-current="page">Author</li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
<!-- /Breadcrumb -->
<div class="container-fluid px-xxl-65 px-xl-20">
    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Author</h4>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                        @if ($author->id)
                        <form action="{{ route('authors.update', $author->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            <h5 class="hk-sec-title">Author Edit</h5>
                            @else
                                <form action="{{ route('authors.store') }}" method="post" enctype="multipart/form-data">
                            <div class="tt-wrapper-inner">
                                <h5 class="hk-sec-title">Author Create</h5>
                            @endif
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-10">
                                    <label for="validationAuthorName">Name</label>
                                    <input type="text" class="form-control" id="validationAuthorName" placeholder="Name" name="name" value="{{$author->name}}" required>
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationAuthorEmail">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="validationAuthorEmail" placeholder="email" aria-describedby="inputGroupPrepend" value="{{$author->email}}" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationAuthorPhoneNo">Phone</label>
                                    <input type="text" class="form-control" id="validationAuthorPhoneNo" name="phone_no" placeholder="Phone Number" value="{{$author->phone_no}}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-10">
                                    <div class="form-group mb-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Address</span>
                                            </div>
                                            <textarea class="form-control" aria-label="With textarea" name="address" required>{{$author->address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-10">
                                    <div class="form-group mb-0">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Photo</span>
                                            </div>
                                            <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                            <span class="input-group-append">
                                                    <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                                            <input type="file" name="photo" value="{{$author->photo}}">
                                            </span>
                                            <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <a href="{{route('authors.index')}}" class="btn btn-warning">Back</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->
</div>
@endsection
