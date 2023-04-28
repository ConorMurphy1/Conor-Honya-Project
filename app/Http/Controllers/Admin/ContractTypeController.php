<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\ContractType;
use Illuminate\Http\Request;

class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contract_types = ContractType::all();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.contract_types.index', compact('contract_types', 'books', 'authors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contract_type = new ContractType();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.contract_types.create-edit', compact('contract_type', 'books', 'authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required|unique:contract_types',
            'description' => 'required|string',
        ]);
        ContractType::create($validate);
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
        $contract_type = ContractType::findOrFail($id);

        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.contract_types.create-edit', compact('contract_type', 'books', 'authors', 'categories'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|unique:contract_types,name,' .$id,
        ]);
        ContractType::findOrFail($id)->update($data);
        return redirect('contract_types');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contract_type = ContractType::findOrFail($id);
        $contract_type->delete();
        return back();
    }
}
