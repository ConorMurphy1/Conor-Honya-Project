@extends('welcome')
@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Books</a></li>
        <li class="breadcrumb-item active" aria-current="page">Customer Type</li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
<!-- /Breadcrumb -->
<div class="container-fluid px-xxl-65 px-xl-20">
    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Customer Type</h4>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                        @if ($customer_type->id)
                        <form action="{{ route('customer-types.update', $customer_type->id)}}" method="post"  >
                        @method('PUT')
                            <h5 class="hk-sec-title">Customer Type Edit</h5>
                        @else
                        <form action="{{ route('customer-types.store') }}" method="post"  >
                            <div class="tt-wrapper-inner">
                                <h5 class="hk-sec-title">Customer Type Create</h5>
                        @endif
                        @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label>Name</label>
                                    <input type="text" class="form-control"  placeholder="Name" name="name" value="{{$customer_type->name}}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <div class="form-group mb-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Description</span>
                                            </div>
                                            <textarea class="form-control" aria-label="With textarea" name="description" required>{{$customer_type->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <a href="{{route('customer-types.index')}}" class="btn btn-warning">Back</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->
</div>
@endsection
