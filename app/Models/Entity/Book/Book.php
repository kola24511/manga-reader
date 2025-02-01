<?php

namespace App\Models\Entity\Book;

use App\Models\Entity\Author\Author;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image_url',
        'status',
        'year_pub',
        'type',
        'pg',
    ];

    public function pg(): HasOne
    {
        return $this->hasOne(Pg::class, 'id', 'pg');
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class, 'id', 'status');
    }

    public function type(): HasOne
    {
        return $this->hasOne(Type::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'books_tags');
    }
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'books_genres');
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'authors_books');
    }
}
