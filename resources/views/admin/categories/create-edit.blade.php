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
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Category</h4>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                        @if ($category->id)
                        <form action="{{ route('categories.update', $category->id)}}" method="post" enctype="multipart/form-data" >
                        @method('PUT')
                            <h5 class="hk-sec-title">Category Edit</h5>
                        @else
                        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" >
                            <div class="tt-wrapper-inner">
                                <h5 class="hk-sec-title">Category Create</h5>
                        @endif
                        @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label for="categoryName">Name</label>
                                    <input type="text" class="form-control"  placeholder="Name" name="name" value="{{$category->name}}" required>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <a href="{{route('categories.index')}}" class="btn btn-warning">Back</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->
</div>
@endsection
