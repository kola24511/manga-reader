<x-app-layout>
    <div class="py-12">
        <div class="flex flex-row container mx-auto px-40 space-x-3">
            <div class="w-3/12">
                <div class="flex flex-col space-y-3">
                    <img class="rounded" src="{{ asset('storage/' . $book->cover_image_url) }}" alt="Cover">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Читать
                    </button>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Добавить в закладки
                    </button>
                    <button class="border text-white font-bold py-2 px-4 rounded">
                        Пожаловаться
                    </button>
                </div>
            </div>
            <div class="w-full">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-col">
                            <div class="text-xs">
                                @if($book->type != null)
                                    {{ $book->type }}
                                @else
                                    Неизвестно
                                @endif
                            </div>
                            <div class="text-2xl py-3">
                                {{ $book->title }}
                            </div>
                            <div class="flex flex-row border-b space-x-6 pb-3.5">
                                <div class="flex flex-col">
                                    <span>
                                        Глав
                                    </span>
                                    <div>
                                        0
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <span>
                                        Лайки
                                    </span>
                                    <div>
                                        {{ $book->likes }}
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                     <span>
                                        Просмотры
                                    </span>
                                    <div>
                                        {{ $book->views }}
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <span>
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
                                    <span>
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
                                    <span>
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
                            <div class="text-md pt-6">
                                @if($book->description != null)
                                    {{ $book->description }}
                                @else
                                    Описание отсутствует
                                @endif
                            </div>
                            <div class="text-md pt-6">
                                Теги
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
