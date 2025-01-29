<?php

namespace Database\Seeders;

use App\Models\Entity\Book\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Анонс',
            'Закончен',
            'Заморожен',
            'Онгоинг',
        ];

        foreach ($statuses as $status) {
            Status::create(['name' => $status]);
        }
    }
}
