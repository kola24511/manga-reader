<?php

namespace App\Models\Entity;

use App\Models\Entity\Book\Book;
use Database\Factories\AuthorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'avatar_url',
    ];

    protected $table = 'authors';

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }

    protected static function newFactory()
    {
        return AuthorFactory::new();
    }
}
