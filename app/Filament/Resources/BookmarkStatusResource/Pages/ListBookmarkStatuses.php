<?php

namespace App\Filament\Resources\BookmarkStatusResource\Pages;

use App\Filament\Resources\BookmarkStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookmarkStatuses extends ListRecords
{
    protected static string $resource = BookmarkStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
