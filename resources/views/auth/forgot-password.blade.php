<x-guest-layout>
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Lupa Kata Sandi') }}
            </h2>
            <p class="text-sm">
                {{ __('Masukkan kata sandi melalui form dibawah. Kami akan mengirimkan link untuk melakukan pengaturan ulang kata sandi Anda.') }}
            </p>
        </div>
    </header>

    <div class="mt-12 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <h1 class="text-lg font-semibold py-5">Atur Ulang Kata Sandi</h1>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Kirim email pengaturan ulang') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>