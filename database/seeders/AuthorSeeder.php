<?php

namespace Database\Seeders;

use App\Models\Entity\Author\Author;
use App\Models\Entity\Author\Role;
use Illuminate\Database\Seeder;


class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::all();

        Author::factory()
            ->count(5)
            ->create()
            ->each(function (Author $author) use ($roles) {
                $author->role_id = $roles->random()->id;
                $author->save();
            });
    }
}
