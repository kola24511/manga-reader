<?php

namespace App\Filament\Resources\PgListResource\Pages;

use App\Filament\Resources\PgResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPg extends EditRecord
{
    protected static string $resource = PgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
