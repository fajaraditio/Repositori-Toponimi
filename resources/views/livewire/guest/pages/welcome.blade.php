<div>
    <section class="flex flex-col py-12 bg-white dark:bg-gray-900"
        style="background: url('{{ url('images/toponym-backdrop.png') }}')">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white">
                Selamat Datang di Repositori Toponimi</h1>
            <p class="mb-8 text-sm font-normal text-white md:text-lg sm:px-16 lg:px-48 dark:text-white">
                Temukan sejarah dan makna di balik nama tempat di seluruh negeri, serta pelajari warisan budaya dan
                geografis yang melekat padanya. Sambut era penemuan dengan lebih mendalam, melalui penelusuran nama-nama
                tempat yang memengaruhi cara kita melihat dan memahami tanah air kita.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="{{ route('toponym') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                    Cari Toponimi
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="{{ route('welcome') }}#about"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Tentang Repositori
                </a>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="py-8 px-8 mx-auto max-w-screen-xl lg:py-16">
            <div class="flex-none md:flex">
                <div class="w-full md:w-1/2">
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 dark:text-white">
                        Apa itu Repositori Toponimi?
                    </h1>
                    <p>
                        Toponimi adalah istilah yang digunakan untuk merujuk pada nama-nama tempat atau geografis,
                        seperti nama
                        kota, desa, sungai, gunung, dan elemen geografis lainnya. Istilah ini biasanya digunakan untuk
                        merujuk
                        pada studi mengenai asal-usul, sejarah, makna, dan penggunaan nama-nama tempat. Penelitian
                        toponimi
                        mencakup pengumpulan, analisis, dan dokumentasi nama-nama tempat untuk memahami warisan budaya,
                        sejarah,
                        linguistik, dan geografi suatu daerah.
                    </p>
                </div>
                <div class="w-full md:w-1/2">
                </div>
            </div>
        </div>
    </section>
</div>