<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadTrait;
use App\Models\{Author, Book, BookCategory, Category};
use Illuminate\Http\Request;

class BookController extends Controller
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
        return view('admin.books.index', compact('books', 'authors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();

        return view('admin.books.create-edit', compact('book', 'authors', 'books', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:books',
            'author_id' => 'required|integer',
            'publisher' => 'required|string',
            'total_chapters' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        if($request->image)
        {
            $imageName = $this->uploadImage('image', 'book_images');
            $validate['image'] = $imageName;
        }
        
        $validate['year'] = date( 'Y' ,strtotime($request->year));
        // dd($validate);
        $book = Book::create($validate);
        for($i = 0; $i < count($request->category_ids); ++$i)
        {
            BookCategory::create([
                'book_id' => $book->id,
                'category_id' => $request->category_ids[$i],
            ]);
        }
        return redirect()->route('books.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();

        // dd($book);

        return view('admin.books.detail', compact('book', 'authors', 'books', 'categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();

        return view('admin.books.create-edit', compact('book', 'authors', 'books', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|unique:books,name'. $id,
            'author_id' => 'required|integer',
            'publisher' => 'required|string',
            'total_chapters' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        if($request->image)
        {
            $imageName = $this->uploadImage('image', 'book_images');
            $validate['image'] = $imageName;
        }
        $validate['year'] = date( 'Y' ,strtotime($request->year));
        // dd($validate);
        Book::findOrFail($id)->update($validate);
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return back();
    }
}
