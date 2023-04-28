<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('he');
        $categories = Category::all();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.categories.index', compact('categories', 'books', 'authors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.categories.create-edit', compact('category', 'books', 'authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories',
        ]);
        Category::create($validate);
        return redirect()->route('categories.index');

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
        $category = Category::findOrFail($id);
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.categories.create-edit', compact('category', 'books', 'authors', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories,name,' .$id,
        ]);
        Category::findOrFail($id)->update($data);
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back();
    }
}
