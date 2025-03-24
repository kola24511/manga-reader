<div class="flex flex-col">
    <div class="text-xs">
        @if($book->type != null)
            {{ $book->type }}
        @else
            Неизвестно
        @endif
    </div>
    <div class="text-2xl font-bold py-3">
        {{ $book->title }}
    </div>
    @include('book.index.header')
    <div class="text-md pt-6">
        @if($book->description != null)
            {{ $book->description }}
        @else
            Описание отсутствует
        @endif
    </div>
    <div class="text-md pt-6">
        <div class="text-xl font-semibold">
            Теги:
        </div>
        @include('book.index.genres')
    </div>
    <div class="text-md pt-6">
        <div class="text-xl font-semibold">
            Авторы:
        </div>
        @include('book.index.author')
    </div>
</div>
