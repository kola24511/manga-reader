<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TypeSeeder::class,
            PgSeeder::class,
            TagSeeder::class,
            StatusSeeder::class,
            GenresSeeder::class,
            AuthorRolesSeeder::class,
            AuthorSeeder::class,
        ]);
    }
}
