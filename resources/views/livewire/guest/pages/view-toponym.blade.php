<header class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $toponym->name }}
        </h2>
        <p>Berikut ini merupakan detail toponim: {{ $toponym->name }}</p>
    </div>
</header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex-none md:flex">
                    <div class="w-full md:w-1/2 p-5 border-r">
                        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight mb-5">
                            Metadata
                        </h2>

                        <table class="w-full text-sm text-left border">
                            <tbody>
                                <tr>
                                    <th class="bg-gray-100 border w-1/3 px-6 py-3">Nama</th>
                                    <td class="border w-2/3 px-6 py-3">{{ $toponym->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-gray-100 border w-1/3 px-6 py-3">Bentuk Kata</th>
                                    <td class="border w-2/3 px-6 py-3">{{ $toponym->word_form }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-gray-100 border w-1/3 px-6 py-3">Kelurahan / Desa</th>
                                    <td class="border w-2/3 px-6 py-3">{{ $toponym->village->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-gray-100 border w-1/3 px-6 py-3">Kecamatan</th>
                                    <td class="border w-2/3 px-6 py-3">{{ $toponym->village->district->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-gray-100 border w-1/3 px-6 py-3">Kab. / Kota</th>
                                    <td class="border w-2/3 px-6 py-3">{{ $toponym->village->district->regency->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-gray-100 border w-1/3 px-6 py-3">Provinsi</th>
                                    <td class="border w-2/3 px-6 py-3">{{
                                        $toponym->village->district->regency->province->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-gray-100 border w-1/3 px-6 py-3">Ditambahkan</th>
                                    <td class="border w-2/3 px-6 py-3">{{ $toponym->created_at }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-gray-100 border w-1/3 px-6 py-3">Terakhir Diperbaharui</th>
                                    <td class="border w-2/3 px-6 py-3">{{ $toponym->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full md:w-1/2 p-5">
                        <div class="mb-5">
                            <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight mb-5">
                                Makna Kata
                            </h2>
                            <p>
                                {{ $toponym->meaning }}
                            </p>
                        </div>

                        <div>
                            <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight mb-5">
                                Sejarah
                            </h2>
                            <p>
                                {{ $toponym->history }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>