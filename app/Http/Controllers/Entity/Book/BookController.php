<?php

namespace App\Http\Controllers\Entity\Book;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index($id)
    {
        $book = DB::table('books')
            ->leftJoin("books_status", "books.status", "=", "books_status.id")
            ->leftJoin("books_pgs", "books.pg", "=", "books_pgs.id")
            ->leftJoin("books_types", "books.type", "=", "books_types.id")
            ->select(
                "books.title",
                "books.cover_image_url",
                "books_status.name as status",
                "books_pgs.pg as pg",
                "books_types.name as type",
                "books.description",
                "books.year_pub",
                "books.likes",
                "books.views"
            )
            ->where('books.id', $id)
            ->first();

        $authors = DB::table('authors')
            ->join('authors_books', 'authors.id', '=', 'authors_books.author_id')
            ->where('authors_books.book_id', $id)
            ->select(
                "authors.id as id",
                "authors.name as name",
                "authors.avatar_url as avatar_url",
            )
            ->get();

        return view('book.index', compact('book', 'authors'));
    }

    public function catalog()
    {
        $books = DB::table("books")
            ->leftJoin("books_status", "books.status", "=", "books_status.id")
            ->leftJoin("books_pgs", "books.pg", "=", "books_pgs.id")
            ->select(
                "books.id",
                "books.title",
                "books.cover_image_url",
                "books_status.name as status",
                "books_pgs.pg as pg"
            )
            ->get();

        return view('book.catalog', ['books' => $books]);
    }
}
