@extends('welcome')
@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Books</a></li>
        <li class="breadcrumb-item active" aria-current="page">Book</li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
<!-- /Breadcrumb -->
<div class="container-fluid px-xxl-65 px-xl-20">
    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Book</h4>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                        @if ($book->id)
                        <form action="{{ route('books.update', $book->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            <h5 class="hk-sec-title">Book Edit</h5>
                            @else
                                <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                            <div class="tt-wrapper-inner">
                                <h5 class="hk-sec-title">Book Create</h5>
                            @endif
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label >Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{$book->name}}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <div class="form-group mb-0">
                                        <label >Cover</label>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Cover</span>
                                            </div>
                                            <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                            <span class="input-group-append">
                                                    <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                                            <input type="file" name="image" value="{{$book->image}}" required>
                                            </span>
                                            <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-10">
                                <label for="contract">Author</label>
                                <select class="form-control custom-select d-block w-100" name="author_id" required>
                                    <option value="">Choose...</option>
                                    @foreach ($authors as $author)
                                        <option @if ($book->author_id == $author->id)
                                            selected
                                        @endif value="{{$author->id}}">{{$author->name}} || {{$author->email}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-10">
                                <label for="contract">Category</label>
                                <select id="input_tags" class="form-control" multiple="multiple" name="category_ids[]">
                                    @foreach ($categories as $category)
                                        <option  value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label >Publisher</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="publisher" aria-describedby="inputGroupPrepend" value="{{$book->publisher}}" name="publisher" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label >Year</label>
                                    <input class="form-control" type="date" value="{{$book->year}}" name="year" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label >Total Chapters</label>
                                    <input class="form-control" type="text" name="total_chapters" value="{{$book->total_chapters}}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label >Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">MMK</span>
                                        </div>
                                        <input type="number" class="form-control"  name="price" value="{{$book->price}}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label>Quantity</label>
                                    <input class="form-control" type="integer" name="quantity" value="{{$book->quantity}}" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label >Description</label>
                                    <div class="form-group mb-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Description</span>
                                            </div>
                                            <textarea required class="form-control" aria-label="With textarea" name="description" required>{{$book->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-10">
                                    <label for="contract">Status</label>
                                    <select class="form-control custom-select d-block w-100" name="status" required>
                                        <option value="">Choose...</option>
                                            <option @if ($book->status == "ComingSoon")
                                                selected
                                            @endif value="ComingSoon">ComingSoon </option>
                                            <option @if ($book->status == "Instock")
                                                selected
                                            @endif value="Instock">Instock </option>
                                            <option @if ($book->status == "OutOfStock")
                                                selected
                                            @endif value="OutOfStock">OutOfStock </option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <a href="{{route('books.index')}}" class="btn btn-warning">Back</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->
</div>
@endsection

@section('scripts')
    <script>
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            autoclose:true //to close picker once year is selected
        });
    </script>
@endsection
