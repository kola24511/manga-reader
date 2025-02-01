<?php

namespace App\Filament\Widgets;

use App\Models\Entity\Author\Author;
use App\Models\Entity\Book\Book;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalUsers = User::count();
        $totalBooks = Book::count();
        $totalAuthors = Author::count();

        return [
            Stat::make('Пользователи', $totalUsers),
            Stat::make('Книги', $totalBooks),
            Stat::make('Авторы', $totalAuthors),
        ];
    }
}
