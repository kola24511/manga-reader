<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class BookService
{
    public function find($id)
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

        $genres = DB::table('genres')
            ->join('books_genres', 'genres.id', '=', 'books_genres.genre_id')
            ->where('books_genres.book_id', $id)
            ->select(
                "genres.id as id",
                "genres.name as name",
            )
            ->get();

        $tags = DB::table('tags')
            ->join('books_tags', 'tags.id', '=', 'books_tags.tag_id')
            ->where('books_tags.book_id', $id)
            ->select(
                "tags.id as id",
                "tags.name as name",
            )
            ->get();

        return [
            "book" => $book,
            "authors" => $authors,
            "genres" => $genres,
            "tags" => $tags
        ];
    }

    public function show()
    {
        return $books = DB::table("books")
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
    }
}
