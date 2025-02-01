<?php

namespace App\Filament\Resources\AuthorStatusResource\Pages;

use App\Filament\Resources\AuthorRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuthorRole extends EditRecord
{
    protected static string $resource = AuthorRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
