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
{{-- @dd($book->name); --}}
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                            <div class="tt-wrapper-inner">
                                <form action="{{route('orders.store')}}" method="post">
                                    @csrf
                                <h5 class="hk-sec-title">Book Detail</h5>
                                @php
                                    $bookcat = App\Models\BookCategory::where('book_id', $book->id)->get();
                                @endphp
                                <div class="form-row">
                                    <input type=""hidden value="{{$book->id}}" name="book_id">
                                    <input type=""hidden value="{{auth()->user()->id}}" name="customer_id">
                                    <img class="card-img-top" style="width: 10%;" src="{{asset('storage/book_images/'.$book->image)}}" alt="Card image cap">
                                    <div class="col-md-12 mb-10">
                                        <label >Name: </label>
                                        <label>{{$book->name}}</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-10">
                                    <label for="contract">Author: </label>
                                        <label>{{$book->author->name}}</label>
                                </div>
                                <div class="col-md-12 mb-10">
                                    <label for="contract">Category: </label>
                                    @for ($i=0; $i < count($bookcat); $i++ )
                                        <label class="bg-success rounded p-1">{{$bookcat[$i]->category->name}}</label>
                                    @endfor
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-10">
                                        <label >Publisher: </label>

                                        <label>{{$book->publisher}}</label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-10">
                                        <label >Year: </label>
                                        <label>{{$book->year}}</label>
                                    <div class="col-md-12 mb-10">
                                        <label >Total Chapters: </label>
                                        <label>{{$book->total_chapters}}</label>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-12 mb-10">
                                        <label >Price: </label>
                                        <label>{{$book->price}} MMK</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-10">
                                    <label >Description: </label>
                                        <label>{{$book->description}}</label>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Add</button>
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
