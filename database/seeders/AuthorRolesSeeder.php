<?php

namespace Database\Seeders;

use App\Models\Entity\Author\Role;
use Illuminate\Database\Seeder;

class AuthorRolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'Автор',
            'Издатель',
            'Художник',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
