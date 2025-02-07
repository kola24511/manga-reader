<x-app-layout>
    <div class="py-12">
        <div class="flex flex-row container mx-auto px-40 space-x-3">
            <div class="w-3/12">
                <div class="flex flex-col space-y-3">
                    <img class="rounded dark:invert"
                         src="{{ $author->avatar_url ? asset('storage/' . $author->avatar_url) : asset('images/default-avatar.png') }}" alt="Cover">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Подписаться
                    </button>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Добавить в избранное
                    </button>
                </div>
            </div>
            <div class="w-full">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-col">
                            <div class="text-2xl">
                                @if($author->name != null)
                                    {{ $author->name }}
                                @else
                                    Неизвестно
                                @endif
                            </div>
                            <div class="text-md pt-6">
                                <span>
                                    Список тайтлов:
                                </span>
                                <div class="flex flex-row space-x-3 py-6">
                                    @foreach($books as $book)
                                        <div class="w-52 h-[21rem] max-w-sm bg-gray-500 rounded overflow-hidden shadow-lg">
                                            <img class="w-full h-72 object-fill"
                                                 src="{{ $book->cover_image_url ? asset('storage/' . $book->cover_image_url) : asset('images/default-avatar.png') }}" alt="Обложка книги">
                                            <div class="px-3 py-1.5">
                                                <a class="font-bold text-md truncate" href="{{ route('book.index', ['id' => $book->id]) }}">
                                                    <span class="inline-block align-middle">
                                                        {{ $book->title }}
                                                    </span>
                                                </a>
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
    </div>
</x-app-layout>
