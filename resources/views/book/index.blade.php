<x-app-layout>
    <div class="py-12">
        <div class="flex flex-row container mx-auto px-40 space-x-3">
            @if($book != null)
                <div class="w-3/12">
                    <div class="flex flex-col space-y-3">
                        @if($book->cover_image_url != null)
                            <img class="rounded" src="{{ asset('storage/' . $book->cover_image_url) }}" alt="Cover">
                        @else
                            <img class="rounded" src="{{ asset('storage/' . 'books/default.png' )}}" alt="Cover">
                        @endif
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Читать
                        </button>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Добавить в закладки
                        </button>
                        <button class="border text-white font-bold py-2 px-4 rounded">
                            Пожаловаться
                        </button>
                    </div>
                </div>
                <div class="w-full">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
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
                                <div class="flex flex-row border-b space-x-6 pb-3.5">
                                    <div class="flex flex-col">
                                    <span class="font-semibold">
                                        Глав
                                    </span>
                                        <div>
                                            0
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                    <span class="font-semibold">
                                        Лайки
                                    </span>
                                        <div>
                                            {{ $book->likes }}
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                     <span class="font-semibold">
                                        Просмотры
                                    </span>
                                        <div>
                                            {{ $book->views }}
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                    <span class="font-semibold">
                                        Статус
                                    </span>
                                        <div>
                                            @if($book->status != null)
                                                {{ $book->status }}
                                            @else
                                                Неизвестно
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                    <span class="font-semibold">
                                        Год публикации
                                    </span>
                                        <div>
                                            @if($book->year_pub != null)
                                                {{ $book->year_pub }}
                                            @else
                                                Неизвестно
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                    <span class="font-semibold">
                                        PG
                                    </span>
                                        <div>
                                            @if($book->pg != null)
                                                {{ $book->pg }}
                                            @else
                                                Неизвестно
                                            @endif
                                        </div>
                                    </div>
                                </div>
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
                                    <div class="flex flex-row space-x-3 py-3">
                                        @foreach($genres as $genre)
                                            <span class="inline-block align-middle">
                                                {{ $genre->name }}
                                            </span>
                                        @endforeach
                                            @foreach($tags as $tag)
                                                <span class="inline-block align-middle">
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="text-md pt-6">
                                    <div class="text-xl font-semibold">
                                        Авторы:
                                    </div>
                                    <div class="flex flex-row space-x-3 py-6">
                                        @foreach($authors as $author)
                                            <div class="w-52 h-[21rem] max-w-sm bg-gray-500 rounded overflow-hidden shadow-lg">
                                                <img class="w-full h-72 object-fill dark:invert"
                                                     src="{{ $author->avatar_url ? asset('storage/' . $author->avatar_url) : asset('images/default-avatar.png') }}" alt="Обложка книги">
                                                <div class="px-3 py-1.5">
                                                    <a class="font-bold text-md truncate" href="{{ route('author.index', ['id' => $author->id]) }}">
                                                        <span class="inline-block align-middle">
                                                            {{ $author->name }}
                                                        </span>
                                                    </a>
                                                    <div class="text-center">
                                                        {{ $author->role }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-white text-6xl">
                Костыль
            </div>
        @endif
    </div>
</x-app-layout>
