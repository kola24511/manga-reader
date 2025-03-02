<?php

namespace App\Http\Controllers\Entity\Author;

use App\Http\Controllers\Controller;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    protected AuthorService $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function find($id)
    {
        $authorData = $this->authorService->find($id);
        return view('author.index', $authorData);
    }

    public function show()
    {
        $authors = $this->authorService->show();
        return view('author.list', ['authors' => $authors]);
    }
}
