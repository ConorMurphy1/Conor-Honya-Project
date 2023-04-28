@extends('welcome')

@section('content')

<div class="container-fluid px-xxl-65 px-xl-20">
    <!-- Title -->
    <div class="hk-pg-header mb-10">
        <div>
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="ion ion-md-bookmarks"></i></span>Order Details</h4>
        </div>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper hk-invoice-wrap pa-35">
                <div class="invoice-from-wrap">
                    <div class="row">
                        <div class="col-md-7 mb-20">
                            <h6 class="mb-5">Honya </h6>
                            <address>
                                    <span class="d-block">4747, Pearl Street</span>
                                    <span class="d-block">Rainy Day Drive, Washington</span>
                                    <span class="d-block">dashgrin@hencework.com</span>
                                </address>
                        </div>
                        <div class="col-md-5 mb-20">
                            <h4 class="mb-35 font-weight-600">Invoice / Receipt</h4>
                            <span class="d-block">Date:<span class="pl-10 text-dark">{{now()}}</span></span>
                            <span class="d-block">Invoice / Receipt #<span class="pl-10 text-dark"></span></span>
                            <span class="d-block">Customer #<span class="pl-10 text-dark">{{$customer}}</span></span>
                        </div>
                    </div>
                </div>
                <hr class="mt-0">
                <h5>Books</h5>
                <hr>
                    <div class="invoice-details">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-striped table-border mb-0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th >Books</th>
                                            <th >Image</th>
                                            <th class="text-right">Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0; 
                                        @endphp
                                        @foreach ($cartBooks as $item)
                                            <tr>
                                                <td>
                                                    <form action="{{ url('orders/' . $item->id) }}" method="post">
                                                        @csrf @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o text-dark"></i></button>
                                                    </form>
                                                </td>
                                                <td>{{$item->book->name}}</td>
                                                <td>
                                                    <img src="{{asset('storage/book_images/'.$item->book->image)}}" style="width: 25%;">
                                                </td>
                                                <td class="text-right">{{$item->book->price}}</td>
                                            </tr>
                                            @php
                                                $total += $item->book->price; // add the price of the current product to the total
                                            @endphp
                                        @endforeach
                                    </tbody>
                                    
                                <form action="{{ url('orders/1') }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <tfoot class="border-bottom border-1">
                                        <tr>
                                            <th colspan="3" class="text-right font-weight-600">Total</th>
                                            <th class="text-right font-weight-600"><input type="text" class="border-none text-right" readonly value="{{$total}}" name="amount"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-10">
                                <label for="validationAuthorName">Payment Type</label>
                                <select name="payment_type" class="form-control">
                                    <option value="visa">Visa</option>
                                    <option value="credit">Credit</option>
                                    <option value="debit">Debit</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-10">
                                <label for="validationAuthorName">Card No</label>
                                <input type="text" class="form-control" id="validationAuthorName" placeholder="Card No" name="card_no" required>
                            </div>
                        </div>
                        <div class="invoice-sign-wrap text-right py-60">
                            <button type="submit" class="btn btn-primary btn-sm">Order</button>
                        </div>
                    </div>
                </form>
                <hr>
                <ul class="invoice-terms-wrap font-14 list-ul">
                    <li>A buyer must settle his or her account within 30 days of the date listed on the invoice.</li>
                    <li>The conditions under which a seller will complete a sale. Typically, these terms specify the period allowed to a buyer to pay off the amount due.</li>
                </ul>
            </section>
        </div>
    </div>
    <!-- /Row -->
</div>
@endsection