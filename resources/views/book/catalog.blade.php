<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                        @foreach ($books as $book)
                            <div class="w-52 h-[22rem] max-w-sm bg-gray-500 rounded overflow-hidden shadow-lg">
                                <img class="w-full h-72 object-fill" src="{{ asset('storage/' . $book->cover_image_url) }}" alt="Обложка книги">
                                <div class="px-3 py-1.5">
                                    <div class="flex">
                                        <div class="mr-2">
                                            @if($book->status != null)
                                                {{ $book->status }}
                                            @else
                                                Неизвестно
                                            @endif
                                        </div>
                                        <div>
                                            @if($book->pg != null)
                                                {{ $book->pg }}
                                            @else
                                                Неизвестно
                                            @endif
                                        </div>
                                    </div>
                                    <a class="font-bold text-md truncate mb-2" href="{{ route('book.index', ['slug' => $book->slug]) }}">{{ $book->title }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
