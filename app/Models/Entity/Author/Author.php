<?php

namespace App\Models\Entity\Author;

use App\Models\Entity\Book\Book;
use Database\Factories\AuthorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role_id',
        'avatar_url',
    ];

    protected $table = 'authors';

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }

    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    protected static function newFactory()
    {
        return AuthorFactory::new();
    }
}
