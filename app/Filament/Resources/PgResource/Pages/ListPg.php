<?php

namespace App\Filament\Resources\PgResource\Pages;

use App\Filament\Resources\PgResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPg extends ListRecords
{
    protected static string $resource = PgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
