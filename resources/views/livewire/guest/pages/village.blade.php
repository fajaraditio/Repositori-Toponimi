<header class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wilayah Kelurahan / Desa di: ' . $district->name) }}
        </h2>
        <p class="text-sm">Berikut daftar wilayah setingkat kelurahan / desa di {{ $district->name }}</p>
    </div>
</header>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @livewire('tables.area-village-table', ['district' => $district])
            </div>
        </div>
    </div>
</div>