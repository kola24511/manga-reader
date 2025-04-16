<div class="p-4 text-white">
    <div class="flex flex-col space-y-2 text-lg">
        <span class="text-black dark:text-gray-200">
            Логин: {{ Auth::user()->name }}
        </span>
        <span class="text-black dark:text-gray-200">
            Почта: {{ Auth::user()->email }}
        </span>
        <span class="text-black dark:text-gray-200">
            Баланс: {{ Auth::user()->money }}
        </span>
        <span class="text-black dark:text-gray-200">
            Дата регистрации: {{ Auth::user()->created_at }}
        </span>
    </div>
</div>
