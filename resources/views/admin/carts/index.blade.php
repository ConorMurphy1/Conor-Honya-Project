@extends('welcome')

@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Books</a></li>
        <li class="breadcrumb-item active" aria-current="page">Order</li>
    </ol>
</nav>
<!-- /Breadcrumb -->
<div class="container-fluid px-xxl-65 px-xl-20">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Order</h4>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <table id="datable_1" class="table w-100 display pb-30 " >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Book</th>
                                        <th>Payment </th>
                                        <th>Card</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    {{-- {{$order->id}} --}}
                                        <tr class="bg-green">
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->customer->name}}</td>
                                            <td>{{$order->book->name}}</td>
                                            <td>{{$order->payment_type}}</td>
                                            <td>{{$order->card_no}}</td>
                                            <td>{{$order->amount}}</td>
                                            <td>{{$order->status}}</td>
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
