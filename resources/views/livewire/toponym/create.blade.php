<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <form wire:submit.prevent="save">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="pb-4">{{ __('Create New Toponym') }}</h1>

                    <hr class="py-2">

                    <div class="grid grid-cols-5 gap-8">
                        <div class="w-full col-span-2">
                            <div class="py-2">
                                <x-input-label for="name" class="font-bold" :value="__('Gazetter Name')" />
                                <x-text-input id="name" class="block mt-1 w-full text-sm" type="text" wire:model="name"
                                    placeholder="{{ __('Example: :exampleText', ['exampleText' => 'Solo']) }}"
                                    :error="$errors->get('name')" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="py-2">
                                <x-input-label for="alias" class="font-bold" :value="__('Alias')" />
                                <x-text-input id="alias" class="block mt-1 w-full text-sm" type="text" name="alias"
                                    placeholder="{{ __('Example: :exampleText', ['exampleText' => 'Surakarta']) }}"
                                    :error="$errors->get('alias')" />
                                <x-input-error :messages="$errors->get('alias')" class="mt-2" />
                            </div>

                            <div class="py-2">
                                <x-input-label for="prev_name" class="font-bold" :value="__('Previous Name')" />
                                <x-text-input id="prev_name" class="block mt-1 w-full text-sm" type="text"
                                    name="prev_name"
                                    placeholder="{{ __('Example: :exampleText', ['exampleText' => 'Kartasura']) }}"
                                    :error="$errors->get('prev_name')" />
                                <x-input-error :messages="$errors->get('prev_name')" class="mt-2" />
                            </div>

                            <div class="py-2">
                                <x-input-label for="language_origin" class="font-bold" :value="__('Asal Bahasa')" />
                                <x-text-input id="language_origin" class="block mt-1 w-full text-sm" type="text"
                                    name="language_origin"
                                    placeholder="{{ __('Example: :exampleText', ['exampleText' => 'Jawa']) }}"
                                    :error="$errors->get('language_origin')" />
                                <x-input-error :messages="$errors->get('language_origin')" class="mt-2" />
                            </div>

                            <div class="py-2">
                                <x-input-label for="meaning" class="font-bold" :value="__('Arti Nama')" />
                                <x-text-input id="meaning" class="block mt-1 w-full text-sm" type="text" name="meaning"
                                    placeholder="{{ __('Example: :exampleText', ['exampleText' => 'Keberanian dan Kemakmuran']) }}"
                                    :error="$errors->get('meaning')" />
                                <x-input-error :messages="$errors->get('meaning')" class="mt-2" />
                            </div>

                            <div class="py-2">
                                <x-input-label for="source" class="font-bold" :value="__('Sumber Data')" />
                                <x-text-input id="source" class="block mt-1 w-full text-sm" type="text" name="source"
                                    placeholder="{{ __('Example: :exampleText', ['exampleText' => 'Peta RBI Skala 5K Tahun 2016']) }}"
                                    :error="$errors->get('source')" required />
                                <x-input-error :messages="$errors->get('source')" class="mt-2" />
                            </div>

                            <div class="py-2">
                                <x-input-label class="pb-2 font-bold">{{ __('Primary Coordinate') }}</x-input-label>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <x-input-label for="primary_latitude" :value="__('Latitude')" />
                                        <x-text-input id="primary_latitude" class="block mt-1 w-full text-sm"
                                            type="text" name="source"
                                            placeholder="{{ __('Example: :exampleText', ['exampleText' => '-7.566667']) }}"
                                            :error="$errors->get('primary_latitude')" required />
                                        <x-input-error :messages="$errors->get('primary_latitude')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="primary_longitude" :value="__('Longitude')" />
                                        <x-text-input id="primary_longitude" class="block mt-1 w-full text-sm"
                                            type="text" name="primary_longitude"
                                            placeholder="{{ __('Example: :exampleText', ['exampleText' => '110.816667']) }}"
                                            :error="$errors->get('primary_longitude')" required />
                                        <x-input-error :messages="$errors->get('primary_longitude')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <div class="py-2">
                                <x-input-label class="pb-2 font-bold">{{ __('Secondary Coordinate') }}</x-input-label>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <x-input-label for="secondary_latitude" :value="__('Latitude')" />
                                        <x-text-input id="primary_latitude" class="block mt-1 w-full text-sm"
                                            type="text" name="source"
                                            placeholder="{{ __('Example: :exampleText', ['exampleText' => '-7.566667']) }}"
                                            :error="$errors->get('secondary_latitude')" required />
                                        <x-input-error :messages="$errors->get('secondary_latitude')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="primary_longitude" :value="__('Longitude')" />
                                        <x-text-input id="primary_longitude" class="block mt-1 w-full text-sm"
                                            type="text" name="primary_longitude"
                                            placeholder="{{ __('Example: :exampleText', ['exampleText' => '110.816667']) }}"
                                            :error="$errors->get('secondary_longitude')" required />
                                        <x-input-error :messages="$errors->get('secondary_longitude')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <div class="py-2">
                                <x-input-label for="status" class="font-bold" :value="__('Status')" />
                                <select name="status"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                                    focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500
                                    dark:focus:ring-red-600 rounded-md shadow-sm w-full mt-1 text-sm {{ $errors->get('status') ? 'border-red-500' : '' }}">
                                    <option value="in-review">Dalam Penelaahan</option>
                                    <option value="valid">Sesuai</option>
                                    <option value="invalid">Belum Sesuai</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>
                        <div class="w-full col-span-3">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 py-3 px-6">
                    <x-primary-button>
                        {{ __('Create New') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>