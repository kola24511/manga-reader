<?php

namespace App\Filament\Resources\BookTagResource\Pages;

use App\Filament\Resources\BookTagResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookTags extends ListRecords
{
    protected static string $resource = BookTagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
