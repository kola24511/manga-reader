<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'pg',
    ];

    public function pgList(): HasOne
    {
        return $this->hasOne(PgList::class, 'id', 'pg');
    }

    public function statusBook(): HasOne
    {
        return $this->hasOne(StatusBook::class, 'id', 'status');
    }
}
