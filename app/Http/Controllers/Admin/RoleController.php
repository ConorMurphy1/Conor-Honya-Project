<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        $roles = Role::all();
        return view('admin.roles.index', compact('roles','authors', 'books', 'categories'));
    }

}
