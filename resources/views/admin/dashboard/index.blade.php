@extends('welcome')
@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Honya</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    {{-- @dd(auth()->user()); --}}

    <!-- Container -->
    <div class="container-fluid px-xxl-65 px-xl-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="layers"></i></span></span>Library</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper hk-gallery-wrap">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel">
                            <h6 class="mt-30 mb-20">Book List</h6>
                            <div class="row hk-gallery">
                                @foreach ($books as $book)
                                @php
                                    $bookcat = App\Models\BookCategory::where('book_id', $book->id)->get();
                                @endphp
                                <div class="row p-2">
                                    <div class="col-sm">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-4 col-xs-12">
                                                <div class="card w-260p w-sm-290p">
                                                    <img class="card-img-top" style="width: 100%;" src="{{asset('storage/book_images/'.$book->image)}}" alt="Card image cap">
                                                    <div class="text-black flex m-2">
                                                        @for ($i=0; $i < count($bookcat); $i++ )
                                                        <label class="bg-success rounded p-1">{{$bookcat[$i]->category->name}}</label>
                                                        @endfor
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{$book->name}}</h5>
                                                        <p class="card-text">{{$book->description}}</p>
                                                        <a href="{{url('books/'.$book->id)}}" class="btn btn-primary">Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->

@endsection
