<div class="flex flex-row space-x-3 py-6">
    @foreach($authors as $author)
        <div class="w-32 h-[11.5rem] max-w-sm bg-white dark:bg-gray-960 dark:border dark:border-gray-930 rounded overflow-hidden shadow-sm">
            <img class="w-full h-32 object-fill"
                 src="{{ $author->avatar_url ? asset('storage/' . $author->avatar_url) : asset('images/default-avatar.png') }}" alt="Обложка книги">
            <div class="px-3 py-1.5">
                <div class="text-left text-sm">
                    {{ $author->role }}
                </div>
                <a class="font-bold text-md truncate" href="{{ route('author.index', ['id' => $author->id]) }}">
                    <span class="font-semibold text-md break-words whitespace-normal mb-2">
                        {{ $author->name }}
                    </span>
                </a>
            </div>
        </div>
    @endforeach
</div>
