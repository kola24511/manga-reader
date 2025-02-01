<?php

namespace App\Filament\Resources;

use App\Models\Entity\Author\Author;
use App\Models\Entity\Author\Role;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationLabel = 'Авторы';

    protected static ?string $navigationGroup = 'Авторы';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('role_id')->label('Роль автора')
                    ->options(static::getAuthorRole())
                    ->required(),
                Forms\Components\FileUpload::make('avatar_url')->label('Ссылка на аватар')
                    ->image()
                    ->directory('authors')
                    ->default("authors/default.png")
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя автора')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role.name')
                    ->label('Роль')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('Аватар')
                    ->default('authors/default.png'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => AuthorResource\Pages\ListAuthors::route('/'),
            'create' => AuthorResource\Pages\CreateAuthor::route('/create'),
            'edit' => AuthorResource\Pages\EditAuthor::route('/{record}/edit'),
        ];
    }

    public static function getAuthorRole()
    {
        return Role::pluck('name', 'id');
    }
}
