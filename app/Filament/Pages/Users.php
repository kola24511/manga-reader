<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Users extends Page
{
    protected static ?string $navigationIcon = 'heroicon-c-user';

    protected static string $view = 'filament.pages.users';
}
