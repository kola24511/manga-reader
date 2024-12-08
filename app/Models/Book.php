<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasOne(PgList::class);
    }
}
