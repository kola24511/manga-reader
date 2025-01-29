<?php

namespace Database\Seeders;

use App\Models\Entity\Author;
use Illuminate\Database\Seeder;


class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::factory()->count(10)->create();
    }
}
