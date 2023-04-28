<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();

        $orders = Order::all();
        return view('admin.carts.index', compact('books', 'authors', 'categories', 'orders'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('lol');
        Order::create([
            'customer_id' => auth()->user()->id,
            'book_id' => $request->book_id,
        ]);
        return redirect()->route('orders.detail');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $cartBooks = Order::where('customer_id', auth()->user()->id)->where('status', null)->get();


        for($i=0; $i<count($cartBooks); $i++) {
            
            $data = $request->validate([
                'card_no' => 'required',
                'payment_type' => 'required',
                'amount' => 'required',
        ]);
        $data['status'] = 'paid';
        Order::findOrFail($cartBooks[$i]->id)->update($data);
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return back();
    }

    public function orderDetail()
    {
        // dd('gege');
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        $customer = Order::where('customer_id', auth()->user()->id)->first('customer_id');
        $cartBooks = Order::where('customer_id', auth()->user()->id)->where('status', null)->get();

        return view('admin.orders.detail', compact( 'books', 'authors', 'categories', 'cartBooks', 'customer'));
    }
}
