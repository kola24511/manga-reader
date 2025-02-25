<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Entity\Book\Book;
use App\Models\Entity\Book\Pg;
use App\Models\Entity\Book\Status;
use App\Models\Entity\Book\Type;
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
                Forms\Components\Select::make('status')->label('Статус перевода')
                    ->options(static::getStatusBook())
                    ->required(),
                Forms\Components\Select::make('genre_id')->label("Жанры")
                    ->multiple()
                    ->relationship('genres', 'name')
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('tag_id')->label("Тэги")
                    ->multiple()
                    ->relationship('tags', 'name')
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('author_id')->label("Авторы")
                    ->multiple()
                    ->relationship('authors', 'name')
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('year_pub')->label('Год публикации')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('type')->label('Тип книги')
                    ->options(static::getTypeList())
                    ->required(),
                Forms\Components\Select::make('pg')->label('Возрастное ограничение')
                    ->options(static::getPgList())
                    ->required(),
                Forms\Components\FileUpload::make('cover_image_url')->label('Ссылка на обложку')
                    ->image()
                    ->directory('books')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Название')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('cover_image_url')->label('Обложка'),
                Tables\Columns\TextColumn::make('status')->label('Статус')
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
                Tables\Columns\TextColumn::make('pg')->label('Возрастное ограничение')
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
        return Pg::pluck('pg', 'id');
    }

    public static function getStatusBook()
    {
        return Status::pluck('name', 'id');
    }

    public static function getTypeList()
    {
        return Type::pluck('name', 'id');
    }
}
