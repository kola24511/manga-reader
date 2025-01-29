<?php

namespace App\Models\Entity\Book;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'genres';

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
