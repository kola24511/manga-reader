<?php

namespace App\Models\Entity;

use App\Models\Entity\Book\Book;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'status_id'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function status()
    {
        return $this->belongsTo(BookmarkStatus::class, 'status_id');
    }
}
