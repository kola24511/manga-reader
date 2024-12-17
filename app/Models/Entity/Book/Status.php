<?php

namespace App\Models\Entity\Book;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Status extends Model
{
    use HasFactory;

    protected $table = 'books_status';

    protected $fillable = [
        'name',
    ];

    public function book(): HasOne
    {
        return $this->hasOne(Book::class);
    }
}
