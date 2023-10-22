<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="75" height="75"
                            version="1.1" viewBox="0 -500 3000 3000" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path fill="#EC2425"
                                d="M710 931c7,264 174,517 373,633 71,47 165,45 226,-11 36,-32 34,-65 -1,-85 -12,-7 -23,-10 -35,-15 -40,-16 -83,-42 -94,-67 54,20 107,33 164,30 36,-2 58,-12 72,-37 10,-20 15,-52 18,-75 16,-156 -78,-308 -251,-314 -58,-2 -114,8 -171,8 -103,1 -211,1 -301,-67zm978 -8c-111,0 -161,86 -159,161 2,110 -11,219 -46,325 -35,106 -87,195 -194,246 467,124 935,-172 998,-679 1,-11 3,-25 3,-35 0,-11 -5,-20 -21,-19 -194,1 -388,0 -581,1zm-159 -223c-2,74 48,160 159,160 193,1 387,0 581,1 16,1 21,-8 21,-19 0,-10 -2,-24 -3,-35 -63,-507 -531,-803 -998,-679 107,51 159,140 194,246 35,106 48,215 46,326zm348 46c-2,7 -3,13 -5,20 -1,5 -3,9 -10,9 -6,0 -8,-4 -10,-9 -1,-7 -2,-13 -4,-20 -8,-27 -17,-55 -31,-81 -27,-51 -75,-75 -127,-92 -12,-4 -19,-5 -32,-7 -8,-1 -15,-4 -15,-13 0,-9 7,-12 15,-14 13,-2 20,-2 32,-6 52,-17 100,-41 127,-93 14,-25 23,-53 31,-81 2,-7 3,-13 4,-19 2,-5 4,-9 10,-9 7,0 9,4 10,9 2,6 3,12 5,19 8,28 17,56 30,81 28,52 75,76 128,93 12,4 19,4 31,6 9,2 16,5 16,14 0,9 -7,12 -16,13 -12,2 -19,3 -31,7 -53,17 -100,41 -128,92 -13,26 -22,54 -30,81zm-1076 -145c0,158 129,287 287,287 159,0 287,-129 287,-287 0,-159 -128,-287 -287,-287 -158,0 -287,128 -287,287z" />
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dasbor') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard.area')" :active="request()->routeIs('dashboard.area')">
                        {{ __('Wilayah') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard.toponym')" :active="request()->routeIs('dashboard.toponym')">
                        {{ __('Toponimi') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dasbor') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard.area')" :active="request()->routeIs('dashboard.area')">
                {{ __('Wilayah') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard.toponym')" :active="request()->routeIs('dashboard.toponym')">
                {{ __('Toponimi') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>