<?php

namespace App\Services;

use AnourValar\EloquentSerialize\Service;
use Illuminate\Support\Facades\DB;

class AuthorService extends Service
{
    public function find($id)
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
                "books.slug as slug",
                "books.cover_image_url as cover_image_url",
            )
            ->get();

        return [
            'author' => $author,
            'books' => $books,
        ];
    }

    public function show()
    {
        return $authors = DB::table("authors")
            ->select(
                "authors.id",
                "authors.name",
                "authors.avatar_url",
            )
            ->get();
    }
}
