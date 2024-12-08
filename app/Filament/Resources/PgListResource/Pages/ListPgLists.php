<?php

namespace App\Filament\Resources\PgListResource\Pages;

use App\Filament\Resources\PgListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPgLists extends ListRecords
{
    protected static string $resource = PgListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
