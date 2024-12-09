<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use App\Models\PgList;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationLabel = 'Тайтлы';

    protected static ?string $navigationGroup = 'Контент';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Название')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')->label('Описание')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('cover_image_url')->label('Ссылка на обложку')
                    ->image()
                    ->directory('books'),
                Forms\Components\TextInput::make('status')->label('Статус перевода')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_id')->label('Не доделано')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('likes')->label('Лайки')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('views')->label('Просмотры')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('year_pub')->label('Год публикации')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('pg')->label('Возрастное ограничение')
                    ->options(static::getPgList())
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('cover_image_url'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('likes')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year_pub')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pg')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }

    public static function getPgList() 
    {
        return PgList::pluck('pg');
    }

    /*
    public static function getStatusBook() 
    {
        return 
    }
     */
}
