<div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : 'profile' }" id="tab_wrapper">
    <nav>
        <a class="px-4 py-2.5 text-xl inline-block align-middle font-medium hover:bg-gray-200 focus:text-blue-500 focus:underline focus:underline-offset-8 dark:text-gray-100 dark:hover:bg-gray-700 dark:focus:text-blue-500"
           :class="{ 'active': tab === 'profile' }"
           @click.prevent="tab = 'profile'; window.location.hash = 'profile'" href="#">
            Профиль
        </a>
        <a class="px-4 py-2.5 text-xl inline-block align-middle font-medium hover:bg-gray-200 focus:text-blue-500 focus:underline focus:underline-offset-8 dark:text-gray-100 dark:hover:bg-gray-700 dark:focus:text-blue-500"
           :class="{ 'active': tab === 'bookmarks' }"
           @click.prevent="tab = 'bookmarks'; window.location.hash = 'bookmarks'" href="#">
            Закладки
        </a>
        <a class="px-4 py-2.5 text-xl inline-block align-middle font-medium hover:bg-gray-200 focus:text-blue-500 focus:underline focus:underline-offset-8 dark:text-gray-100 dark:hover:bg-gray-700 dark:focus:text-blue-500"
           :class="{ 'active': tab === 'subscription' }"
           @click.prevent="tab = 'subscription'; window.location.hash = 'subscription'" href="#">
            Подписка
        </a>
        <a class="px-4 py-2.5 text-xl inline-block align-middle font-medium hover:bg-gray-200 focus:text-blue-500 focus:underline focus:underline-offset-8 dark:text-gray-100 dark:hover:bg-gray-700 dark:focus:text-blue-500"
           :class="{ 'active': tab === 'achievements' }"
           @click.prevent="tab = 'achievements'; window.location.hash = 'achievements'" href="#">
            Достижения
        </a>
    </nav>

    <div x-show="tab === 'profile'">
        @include('dashboard.tabs.profile')
    </div>
    <div x-show="tab === 'bookmarks'">
        @include('dashboard.tabs.bookmarks')
    </div>
    <div x-show="tab === 'subscription'">
        @include('dashboard.tabs.subscription')
    </div>
    <div x-show="tab === 'achievements'">
        @include('dashboard.tabs.achievements')
    </div>
</div>
