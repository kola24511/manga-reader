<?php

namespace Database\Seeders;

use App\Models\Entity\Book\Pg;
use Illuminate\Database\Seeder;

class PgSeeder extends Seeder
{
    public function run(): void
    {
        $pgs = [
            '0+',
            '6+',
            '12+',
            '16+',
            '18+'
        ];

        foreach ($pgs as $pg) {
            Pg::create(['pg' => $pg]);
        }
    }
}
