<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookmarkStatusResource\Pages;
use App\Filament\Resources\BookmarkStatusResource\RelationManagers;
use App\Models\Entity\BookmarkStatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookmarkStatusResource extends Resource
{
    protected static ?string $model = BookmarkStatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Статус закладок';

    protected static ?string $navigationGroup = 'Контент';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('Название')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Название')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookmarkStatuses::route('/'),
            'create' => Pages\CreateBookmarkStatus::route('/create'),
            'edit' => Pages\EditBookmarkStatus::route('/{record}/edit'),
        ];
    }
}
