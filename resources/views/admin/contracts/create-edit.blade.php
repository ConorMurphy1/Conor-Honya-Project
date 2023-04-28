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
                        @if ($contract->id)
                        <form action="{{ route('contracts.update', $contract->id)}}" method="post" enctype="multipart/form-data" >
                        @method('PUT')
                            <h5 class="hk-sec-title">Contract Edit</h5>
                        @else
                        <form action="{{ route('contracts.store') }}" method="post" enctype="multipart/form-data" >
                            <div class="tt-wrapper-inner">
                                <h5 class="hk-sec-title">Contract Create</h5>
                        @endif
                        @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-10">
                                    <label for="author">Author</label>
                                    <select class="form-control custom-select d-block w-100" name="author_id">
                                        <option value="">Choose...</option>
                                        @foreach ($authors as $author)
                                            <option value="{{$author->id}}">{{$author->name}} || {{$author->email}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-10">
                                    <label for="contract">Contract Type</label>
                                    <select class="form-control custom-select d-block w-100" name="contract_type_id">
                                        <option value="">Choose...</option>
                                        @foreach ($contract_types as $contract_type)
                                            <option value="{{$contract_type->id}}">{{$contract_type->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <div class="form-group mb-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Notes</span>
                                            </div>
                                            <textarea class="form-control" aria-label="With textarea" name="notes" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <a href="{{route('contracts.index')}}" class="btn btn-warning">Back</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->
</div>
@endsection
