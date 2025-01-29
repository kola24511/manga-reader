<?php

namespace Database\Seeders;

use App\Models\Entity\Book\Genre;
use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            'Боевые искусства', 'Гарем', 'Детектив', 'Драма', 'История', 'Киберпанк', 'Комодо', 'Комедия', 'Меха', 'Мистика',
            'Мурим', 'Научная фантастика', 'Повседневность', 'Постапокалиптика', 'Приключения', 'Психология', 'Романтика',
            'Сверхъестественное', 'Сёнэн', 'Сёдзё', 'Спорт', 'Сэйнэн', 'Трагедия', 'Триллер', 'Ужасы', 'Фантастика', 'Фэнтези',
            'Школьная жизнь', 'Экшен', 'Юмор', 'Этти',
        ];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}
