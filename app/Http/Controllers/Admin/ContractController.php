<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Contract;
use App\Models\ContractType;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::all();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.contracts.index', compact('contracts', 'books', 'authors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contract = new Contract();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        $contract_types = ContractType::all();
        return view('admin.contracts.create-edit', compact('contract', 'authors', 'contract_types','books', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'author_id' => 'required|unique:contracts',
            'contract_type_id' => 'required',
            'notes' => 'required|string'
        ]);
        Contract::create($validate);
        return redirect()->route('contracts.index');

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
        $contract = Contract::findOrFail($id);
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.contracts.create-edit', compact('contract', 'books', 'authors', 'categories'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|unique:contracts,name,' .$id,
        ]);
        Contract::findOrFail($id)->update($data);
        return redirect('contracts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();
        return back();
    }
}
