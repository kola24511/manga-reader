<div x-data="bookmarkHandler({ bookId: {{ $book->id }}, status: {{ json_encode($currentBookmarkStatus) }} })">
    <select x-model="selectedStatus"
            @change="saveBookmark"
            x-effect="console.log('selectedStatus изменился:', selectedStatus)"
            class="border rounded p-2">
        <option value="">Выбрать статус</option>
        @foreach($bookmarkStatuses as $status)
            <option value="{{ $status->id }}">
                {{ $status->name }}
            </option>
        @endforeach
    </select>
</div>
