<?php

namespace App\Filament\Resources\AuthorRoleResource\Pages;

use App\Filament\Resources\AuthorRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAuthorRoles extends ListRecords
{
    protected static string $resource = AuthorRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
