<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use App\Models\PgList;
use App\Models\StatusBook;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

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
                Forms\Components\Select::make('status')->label('Статус перевода')
                    ->options(static::getStatusBook())
                    ->required(),
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
                Tables\Columns\TextColumn::make('title')->label('Название')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('cover_image_url')->label('Обложка'),
                Tables\Columns\TextColumn::make('statusBook.name')->label('Статус')
                    ->searchable(),
                Tables\Columns\TextColumn::make('likes')->label('Лайки')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('views')->label('Просмотры')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year_pub')->label('Год публикации')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pgList.pg')->label('Возрастное ограничение')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Дата создания')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->label('Дата обновления')
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
        return PgList::pluck('pg', 'id');
    }

    public static function getStatusBook()
    {
        return StatusBook::pluck('name', 'id');
    }

    /*
    public static function getStatusBook()
    {
        return
    }
     */
}
