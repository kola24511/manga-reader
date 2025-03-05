<div class="p-4 text-white">
    <div class="flex flex-col space-y-2 text-lg">
        <span>
            Логин: {{ Auth::user()->name }}
        </span>
        <span>
            Почта: {{ Auth::user()->email }}
        </span>
        <span>
            Баланс: {{ Auth::user()->money }}
        </span>
        <span>
            Дата регистрации: {{ Auth::user()->created_at }}
        </span>
    </div>
</div>
