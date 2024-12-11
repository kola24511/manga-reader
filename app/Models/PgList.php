<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PgList extends Model
{
    use HasFactory;

    protected $table = 'pg_lists';

    protected $fillable = [
        'pg',
    ];

    public function book(): HasOne
    {
        return $this->hasOne(Book::class);
    }
}
