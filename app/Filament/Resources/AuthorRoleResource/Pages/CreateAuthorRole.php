<?php

namespace App\Filament\Resources\AuthorStatusResource\Pages;

use App\Filament\Resources\AuthorRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAuthorRole extends CreateRecord
{
    protected static string $resource = AuthorRoleResource::class;
}
