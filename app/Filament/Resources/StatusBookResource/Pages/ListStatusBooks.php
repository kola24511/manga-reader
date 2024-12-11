<?php

namespace App\Filament\Resources\StatusBookResource\Pages;

use App\Filament\Resources\StatusBookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusBooks extends ListRecords
{
    protected static string $resource = StatusBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
