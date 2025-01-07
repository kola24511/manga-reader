<?php

namespace App\Http\Controllers\Entity\Author;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function authorMain($id)
    {
        $author = DB::table('authors')
            ->select(
                "authors.name",
                "authors.avatar_url",
            )
            ->where('authors.id', $id)
            ->first();

        $books = DB::table('books')
            ->join('authors_books', 'books.id', '=', 'authors_books.book_id')
            ->where('authors_books.author_id', $id)
            ->select(
                "books.id as id",
                "books.title as title",
                "books.cover_image_url as cover_image_url",
            )
            ->get();

        return view('author.index', compact('author', 'books'));
    }

    public function authorsShow()
    {
        $authors = DB::table("authors")
            ->select(
                "authors.id",
                "authors.name",
                "authors.avatar_url",
            )
            ->get();

        return view('author.list', ['authors' => $authors]);
    }
}
