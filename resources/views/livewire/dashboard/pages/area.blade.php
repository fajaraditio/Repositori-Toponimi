<header class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @if (!empty($provinceId))
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wilayah Kab. / Kota') }}
        </h2>
        <p>Berikut daftar wilayah setingkat kabupaten / kota</p>
        
        @elseif (!empty($regencyId))
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wilayah Kecamatan') }}
        </h2>
        <p>Berikut daftar wilayah setingkat kecamatan</p>

        @elseif (!empty($district))
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wilayah Kelurahan / Desa') }}
        </h2>
        <p>Berikut daftar wilayah setingkat kelurahan / desa</p>

        @else
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wilayah Provinsi') }}
        </h2>
        <p>Berikut daftar wilayah setingkat provinsi</p>
        @endif
    </div>
</header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if (!empty($provinceId))
                @livewire('tables.area-regency-table', ['province' => $province])
                @elseif (!empty($regencyId))
                @livewire('tables.area-district-table', ['regency' => $regency])
                @elseif (!empty($districtId))
                @livewire('tables.area-village-table', ['district' => $district])
                @else
                @livewire('tables.area-province-table')
                @endif
            </div>
        </div>
    </div>
</div>