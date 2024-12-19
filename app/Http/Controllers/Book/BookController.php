<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Entity\Book\Tag;
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

        return view('book.index', compact('book'));
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
