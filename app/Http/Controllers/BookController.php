<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|min:3|max:255',
            'author'      => 'required|string|min:3|max:255',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        Book::create([
            'title'       => $request->title,
            'name'        => $request->title,
            'author'      => $request->author,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return redirect()->route('books.index')->with('success', 'Buku baru berhasil ditambahkan!');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title'       => 'required|string|min:3|max:255',
            'author'      => 'required|string|min:3|max:255',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $book->update([
            'title'       => $request->title,
            'name'        => $request->title,
            'author'      => $request->author,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}