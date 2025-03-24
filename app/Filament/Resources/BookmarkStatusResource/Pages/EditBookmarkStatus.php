<?php

namespace App\Filament\Resources\BookmarkStatusResource\Pages;

use App\Filament\Resources\BookmarkStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookmarkStatus extends EditRecord
{
    protected static string $resource = BookmarkStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
