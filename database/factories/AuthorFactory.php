<?php

namespace Database\Factories;

use App\Models\Entity\Author\Author;
use App\Models\Entity\Author\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
