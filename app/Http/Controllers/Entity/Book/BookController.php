<?php

namespace App\Http\Controllers\Entity\Book;

use App\Http\Controllers\Controller;
use App\Services\BookService;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    protected BookService $bookService;

    public function __construct(BookService $bookService) {
        $this->bookService = $bookService;
    }

    public function find($id)
    {
        $bookData = $this->bookService->find($id);
        return view('book.index', $bookData);
    }

    public function show()
    {
        $books = $this->bookService->show();
        return view('book.catalog', ['books' => $books]);
    }
}
