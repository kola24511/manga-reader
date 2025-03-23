<div class="flex flex-row border-b space-x-6 pb-3.5">
    <div class="flex flex-col">
        <span class="font-semibold">
            Глав
        </span>
        <div>
            0
        </div>
    </div>
    <div class="flex flex-col">
        <span class="font-semibold">
            Лайки
        </span>
        <div>
            {{ $book->likes }}
        </div>
    </div>
    <div class="flex flex-col">
        <span class="font-semibold">
            Просмотры
        </span>
        <div>
            {{ $book->views }}
        </div>
    </div>
    <div class="flex flex-col">
        <span class="font-semibold">
            Статус
        </span>
        <div>
            @if($book->status != null)
                {{ $book->status }}
            @else
                Неизвестно
            @endif
        </div>
    </div>
    <div class="flex flex-col">
        <span class="font-semibold">
            Год публикации
        </span>
        <div>
            @if($book->year_pub != null)
                {{ $book->year_pub }}
            @else
                Неизвестно
            @endif
        </div>
    </div>
    <div class="flex flex-col">
        <span class="font-semibold">
            PG
        </span>
        <div>
            @if($book->pg != null)
                {{ $book->pg }}
            @else
                Неизвестно
            @endif
        </div>
    </div>
</div>
