<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Entity\Book\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function catalog()
    {
        /*
        $books = DB::table("books")->select(
            "title",
            "cover_image_url",
            "status",
            "pg"
        )->get();
        */

        $books = DB::table("books")
            ->join("books_status", "books.status", "=", "books_status.id")
            ->join("books_pgs", "books.pg", "=", "books_pgs.id")
            ->select(
                "books.title",
                "books.cover_image_url",
                "books_status.name as status",
                "books_pgs.pg as pg"
            )
            ->get();

        return view('book.catalog', ['books' => $books]);
    }
}
