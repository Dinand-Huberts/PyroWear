<nav x-data="{ open: false }" class="bg-favocrew_black border-b border-favocrew_red">
    <!-- Primary Navigation Menu -->
    <div class="max-w-screen mx-0 px-4 sm:px-6 lg:px-8">
        {{-- align right --}}
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-16 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-10 sm:flex sm:flex align-right ml-10">

                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    
                    <div class="absolute my-auto top-4 right-20 w-16">
                        <!-- Winkelwagen Knop -->
                        <button id="cart-button" class="bg-favocrew_darkgrey text-white px-4 py-2 rounded-xl hover:bg-favocrew_grey transition duration-300 ease-in-out">
                            <img src="./img/cart.svg" alt="">
                        </button>
                        <!-- Aantal items in winkelwagen (pas dit aan op basis van je gegevens) -->
                        <span class="absolute top-0 right-0 h-4 w-4 bg-red-600 text-white text-xs flex items-center justify-center rounded-full">

                            {{-- get amount of procucts in cart session --}}
                            @if (session()->has('cart'))
                            @php
                            // Haal de 'cart' sessie op
                            $cart = session('cart');
                            
                            // Initialiseer een variabele om het totale aantal producten bij te houden
                            $totalQuantity = 0;
                            
                            // Loop door de 'cart' array en tel de 'quantity' waarden op
                            foreach ($cart as $item) {
                                // Controleer of de 'quantity' waarde numeriek is voordat je deze optelt
                                if (is_numeric($item['quantity'])) {
                                    $totalQuantity += (int)$item['quantity'];
                                }
                            }

                            // clear session
                            
                        @endphp
                                 {{ $totalQuantity }}
                            @else
                                0
                            @endif
                        </span>
                        <!-- Einde Winkelwagen Knop -->
                    </div>

                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Auth::user())
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        @endif 
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger --> 
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

              
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if (Auth::user())
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            @endif
            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
