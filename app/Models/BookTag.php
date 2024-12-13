<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BookTag extends Model
{
    use HasFactory;

    protected $table = 'books_tags';

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        ''
    ];

    public function book(): HasOne
    {
        return $this->hasOne(Book::class);
    }
}
