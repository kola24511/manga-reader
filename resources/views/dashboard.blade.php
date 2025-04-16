<x-app-layout>
    @include('dashboard.header')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-960 overflow-hidden shadow-sm sm:rounded-lg">
                @include('dashboard.navigation')
            </div>
        </div>
    </div>
</x-app-layout>
