<?php

namespace App\Models\Entity\Author;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Role extends Model
{
    use HasFactory;

    protected $table = 'authors_roles';

    protected $fillable = [
        'name',
    ];

    public function authors(): HasOne
    {
        return $this->hasOne(Author::class);
    }
}
