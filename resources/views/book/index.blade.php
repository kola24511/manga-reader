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

                        @auth()
                            @include('book.index.scripts')
                            @include('book.index.bookmark')
                        @endauth
                    </div>
                </div>
                <div class="w-full">
                    <div class="bg-white dark:bg-gray-960 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @include('book.index.properties')
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-white text-6xl">
                Книга не найдена
            </div>
        @endif
    </div>
</x-app-layout>
