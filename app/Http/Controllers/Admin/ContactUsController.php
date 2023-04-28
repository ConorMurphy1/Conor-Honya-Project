<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        $contactUs = ContactUs::all();

        return view('admin.contact_us.index', compact ('books', 'authors', 'categories', 'contactUs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contactUs = new ContactUs();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        
        return view('admin.contact_us.create', compact ('books', 'authors', 'categories', 'contactUs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'feedback' => 'required'
        ]);
        ContactUs::create($validate);
        return redirect()->route('home');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
