<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        $users = User::all();
        return view('admin.users.index', compact('users','authors', 'books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();

        return view('admin.users.create', compact('user','authors', 'books', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users.email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => 'nullable',
            'phone' => 'nullable',
        ]);

        if($request->image)
        {
            $imageName = $this->uploadImage('image', 'user_images');
            $data['image'] = $imageName;
        }
        
        if(!$request->role_id)
        {
            $data['role_id'] = 3;
        }

        dd($data);

        $user = User::create($data);
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
