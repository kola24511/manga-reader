<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                        @foreach ($authors as $author)
                            <div class="w-52 h-[21rem] max-w-sm bg-gray-500 rounded overflow-hidden shadow-lg">
                                <img class="w-full h-72 object-fill dark:invert"
                                     src="{{ $author->avatar_url ? asset('storage/' . $author->avatar_url) : asset('images/default-avatar.png') }}">
                                <div class="px-3 py-1.5">
                                    <a class="font-bold text-md truncate" href="{{ route('author.index', ['id' => $author->id]) }}">
                                        <span class="inline-block align-middle">
                                            {{ $author->name }}
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
</x-app-layout>
