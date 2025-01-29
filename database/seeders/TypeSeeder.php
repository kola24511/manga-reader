<?php

namespace Database\Seeders;

use App\Models\Entity\Book\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'Манга',
            'Манхва',
            'Маньхуа',
            'Комикс',
            'Рукомикс'
        ];

        foreach ($types as $type) {
            Type::create(['name' => $type]);
        }
    }
}
