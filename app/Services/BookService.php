<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class BookService
{
    public function find($slug)
    {
        $book = $this->getBookBySlug($slug);

        if (!$book) {
            abort(404);
        }

        $bookmarkData = $this->getBookmarkData($book->id);

        return [
            "book" => $book,
            "authors" => $this->getAuthors($book->id),
            "genres" => $this->getGenres($book->id),
            "tags" => $this->getTags($book->id),
            "bookmarkStatuses" => $bookmarkData["bookmarkStatuses"],
            "currentBookmarkStatus" => $bookmarkData["currentBookmarkStatus"],
        ];
    }

    private function getBookBySlug($slug)
    {
        return DB::table('books')
            ->leftJoin("books_status", "books.status", "=", "books_status.id")
            ->leftJoin("books_pgs", "books.pg", "=", "books_pgs.id")
            ->leftJoin("books_types", "books.type", "=", "books_types.id")
            ->select(
                "books.id",
                "books.title",
                "books.slug",
                "books.cover_image_url",
                "books_status.name as status",
                "books_pgs.pg as pg",
                "books_types.name as type",
                "books.description",
                "books.year_pub",
                "books.likes",
                "books.views"
            )
            ->where('books.slug', $slug)
            ->first();
    }

    private function getAuthors($bookId)
    {
        return DB::table('authors')
            ->join('authors_books', 'authors.id', '=', 'authors_books.author_id')
            ->leftJoin("authors_roles", "authors.role_id", "=", "authors_roles.id")
            ->where('authors_books.book_id', $bookId)
            ->select(
                "authors.id as id",
                "authors.name as name",
                "authors_roles.name as role",
                "authors.avatar_url as avatar_url"
            )
            ->get();
    }

    private function getGenres($bookId)
    {
        return DB::table('genres')
            ->join('books_genres', 'genres.id', '=', 'books_genres.genre_id')
            ->where('books_genres.book_id', $bookId)
            ->select("genres.id as id", "genres.name as name")
            ->get();
    }

    private function getTags($bookId)
    {
        return DB::table('tags')
            ->join('books_tags', 'tags.id', '=', 'books_tags.tag_id')
            ->where('books_tags.book_id', $bookId)
            ->select("tags.id as id", "tags.name as name")
            ->get();
    }

    public function show()
    {
        return $books = DB::table("books")
            ->leftJoin("books_status", "books.status", "=", "books_status.id")
            ->leftJoin("books_pgs", "books.pg", "=", "books_pgs.id")
            ->select(
                "books.id",
                "books.title",
                "books.slug",
                "books.cover_image_url",
                "books_status.name as status",
                "books_pgs.pg as pg"
            )
            ->get();
    }

    private function getBookmarkData($bookId)
    {
        return [
            "bookmarkStatuses" => DB::table('bookmark_statuses')->get(),
            "currentBookmarkStatus" => DB::table('bookmarks')
                ->where('user_id', auth()->id())
                ->where('book_id', $bookId)
                ->value('status_id')
        ];
    }
}
