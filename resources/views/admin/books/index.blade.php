@extends('welcome')

@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Books</a></li>
        <li class="breadcrumb-item active" aria-current="page">Book</li>
    </ol>
</nav>
<!-- /Breadcrumb -->
<div class="container-fluid px-xxl-65 px-xl-20">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Books</h4>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <a href="{{route('books.create')}}" class="btn btn-success mb-4">Add New</a>
                {{-- <p class="mb-40">Add advanced interaction controls to HTML tables like <code>search, pagination & selectors</code>. For responsive table just add the <code>responsive: true</code> to your DataTables function. <a href="https://datatables.net/reference/option/" target="_blank">View all options</a>.</p> --}}
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <table id="datable_1" class="table table-hover w-100 display pb-30 bg-blue">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Publiser</th>
                                        <th>Year</th>
                                        <th>Total Chapters</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                    @php
                                        $bookcat = App\Models\BookCategory::where('book_id', $book->id)->get();
                                        // add the price of the current product to the total
                                    @endphp
                                        <tr class="bg-blue">
                                            <td class="bg-blue">{{$book->id}}</td>
                                            <td>{{$book->name}}</td>
                                            <td>
                                                <img src="{{asset('storage/book_images/'.$book->image)}}" style="width: 25%;">
                                            </td>
                                            <td>@for ($i=0; $i < count($bookcat); $i++ )
                                                <span class="bg-primary ">{{$bookcat[$i]->category->name}}</span>
                                            @endfor</td>
                                            <td>{{$book->author->name}}</td>
                                            <td>{{$book->publisher}}</td>
                                            <td>{{$book->year}}</td>
                                            <td>{{$book->total_chapters}}</td>
                                            <td>{{$book->description}}</td>
                                            <td>{{$book->status}}</td>
                                            <td>{{$book->price}}</td>
                                            <td>{{$book->quantity}}</td>
                                            <td>
                                                <form action="{{ url('books/' . $book->id) }}" method="post">
                                                @csrf @method('delete')
                                                <a href="{{ url('books/'.$book->id.'/edit') }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit text-dark"></i></a>
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
