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
