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
