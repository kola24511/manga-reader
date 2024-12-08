<?php

namespace App\Filament\Resources\PgListResource\Pages;

use App\Filament\Resources\PgListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPgList extends EditRecord
{
    protected static string $resource = PgListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
