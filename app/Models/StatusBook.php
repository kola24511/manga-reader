<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StatusBook extends Model
{
    use HasFactory;

    protected $table = 'status_books';

    protected $fillable = [
        'name',
    ];

    public function book(): HasOne
    {
        return $this->hasOne(Book::class);
    }
}
