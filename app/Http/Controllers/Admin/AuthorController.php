<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadTrait;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.authors.index', compact('authors', 'books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $author = new Author();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.authors.create-edit', compact('author', 'authors', 'books', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:authors',
            'phone_no' => 'required|string',
            'address' => 'nullable|string',
        ]);
        if($request->photo)
        {
            $imageName = $this->uploadImage('photo', 'author_images');
            $validate['photo'] = $imageName;
        }

        Author::create($validate);
        return redirect()->route('authors.index');

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
        $author = Author::findOrFail($id);
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.authors.create-edit', compact('author', 'authors', 'books', 'categories'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:,email,' .$id,
            'phone_no' => 'required|string',
            'address' => 'nullable|string',
        ]);
        if($request->photo)
        {
            $imageName = $this->uploadImage('photo', 'author_images');
            $data['photo'] = $imageName;
        }
        Author::findOrFail($id)->update($data);
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('authors.index');
    }
}

