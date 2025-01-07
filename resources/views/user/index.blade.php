<x-app-layout>
    <div class="py-12">
        <div class="flex flex-row container mx-auto px-40 space-x-3">
            @if($user != null)
            <div class="text-white">
                {{ $user->name }}
            </div>
            @else
                <div class="text-white">
                    Пользователь не найден
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
