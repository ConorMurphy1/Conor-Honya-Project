<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\CustomerType;
use Illuminate\Http\Request;

class CustomerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer_types = CustomerType::all();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.customer_types.index', compact('customer_types', 'books', 'authors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer_type = new CustomerType();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.customer_types.create-edit', compact('customer_type', 'books', 'authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required|unique:customer_types',
            'description' => 'required|string',
        ]);
        CustomerType::create($validate);
        return redirect()->route('customer-types.index');

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
        $customer_type = CustomerType::findOrFail($id);
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.customer_types.create-edit', compact('customer_type', 'books', 'authors', 'categories'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|unique:customer_types,name,' .$id,
            'description' => 'required|string'
        ]);
        CustomerType::findOrFail($id)->update($data);
        return redirect()->route('customer-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer_type = CustomerType::findOrFail($id);
        $customer_type->delete();
        return back();
    }
}
