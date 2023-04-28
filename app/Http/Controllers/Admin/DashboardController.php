<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Author, Book, Category};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        // dd(auth()->user());
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        
        return view ('admin.dashboard.index', compact ('books', 'authors', 'categories'));
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $books = Book::where(function ($job) use ($request){
                            if ($request->name)
                            {
                                $job->where('name', 'LIKE', '%'.$request->name.'%');
                            }
                            if ($request->author_id)
                            {
                                $job->where('author_id', $request->author_id);
                            }
                            if ($request->year)
                            {
                                $job->where('year', $request->year);
                            }
                            if ($request->category_id)
                            {
                                $job->whereHas('category', function ($query) use ($request)
                            {
                                $query->whereIn('category_id', $request->category_id);
                            });
                            }
                        });
        $authors = Author::all();
        $categories = Category::all();

        
        return view ('admin.dashboard.index', compact ('books', 'authors', 'categories'));
    }
    public function latest()
    {
        $books = Book::paginate(5);
        $authors = Author::all();
        $categories = Category::all();
        
        return view ('admin.dashboard.index', compact ('books', 'authors', 'categories'));
    }

    public function detail($id)
    {
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();

        $book = Book::where('id', $id)->get();
        
        return view ('admin.books.detail', compact ('books', 'authors', 'categories', 'book'));
    }

}
