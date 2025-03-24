<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class BookmarkStatus extends Model
{
    protected $fillable = [
        'name'
    ];

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'status_id');
    }
}
