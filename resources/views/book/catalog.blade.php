<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-960 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                        @foreach ($books as $book)
                            <a href="{{ route('book.index', ['slug' => $book->slug]) }}" class="w-48 h-[23rem] max-w-sm bg-white dark:bg-gray-960 dark:border dark:border-gray-930 rounded overflow-hidden shadow-sm dark:shadow-xl">
                            <img class="w-full h-72 object-fill" src="{{ asset('storage/' . $book->cover_image_url) }}" alt="Обложка книги">
                                <div class="px-3 py-1.5">
                                    <div class="flex text-sm">
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
                                    <span class="font-semibold text-md break-words whitespace-normal mb-2">
                                        {{ $book->title }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
