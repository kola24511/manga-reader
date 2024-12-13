<?php

namespace App\Filament\Resources\BookTagResource\Pages;

use App\Filament\Resources\BookTagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBookTag extends CreateRecord
{
    protected static string $resource = BookTagResource::class;
}
