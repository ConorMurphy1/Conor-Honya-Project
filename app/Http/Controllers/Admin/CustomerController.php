<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.customers.index', compact('customers', 'books', 'authors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = new Customer();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.customers.create-edit', compact('customer', 'books', 'authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required|unique:customers',
            'description' => 'required|string',
        ]);
        Customer::create($validate);
        return redirect()->route('contract-types.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.customers.create-edit', compact('customer', 'books', 'authors', 'categories'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|unique:customers,name,' .$id,
        ]);
        Customer::findOrFail($id)->update($data);
        return redirect('customers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return back();
    }
}
