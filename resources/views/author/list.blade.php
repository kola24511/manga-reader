<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-960 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                        @foreach ($authors as $author)
                            <a href="{{ route('author.index', ['id' => $author->id]) }}" class="w-32 h-[11.5rem] max-w-sm bg-white dark:bg-gray-960 dark:border dark:border-gray-930 rounded overflow-hidden shadow-sm">
                                <img class="w-full h-32 object-fill"
                                     src="{{ $author->avatar_url ? asset('storage/' . $author->avatar_url) : asset('images/default-avatar.png') }}" alt="Изображение"/>
                                <div class="flex px-3 py-1.5">
                                    <span class="font-semibold text-md mx-auto break-words whitespace-normal mb-2 overflow-hidden text-ellipsis"
                                          style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                          {{ $author->name }}
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
