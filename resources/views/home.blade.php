<x-guest-layout>
    {{-- {{dd($cart)}} --}}
    <div class="w-full max-w-screen-xl px-4 py-8">
        <div class="flex flex-wrap -mx-4">
    {{-- {{dd(session()->get('cart'))}} --}}
    @foreach ($products as $product)

            <!-- Product Container -->
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-4 mb-8">
                <div class="bg-zinc-800 shadow-lg rounded-lg overflow-hidden">
                    <img src="/img/image{{ $product->id }}.jpg" alt="Product Image" class="w-full h-56 object-cover object-center">
                    <div class="p-4">
                        <h2 class="text-2xl font-semibold text-white mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-400 mb-4">{{ $product->description }}</p>
                        <button data-product-id="{{ $product->id }}"  class="bg-favocrew_darkgrey text-white px-4 py-2 rounded-lg hover:bg-favocrew_grey transition duration-300 ease-in-out product-info-button">
                            Meer Info
                        </button>
                    </div>
                </div>
            </div>


    <div id="product-popup{{ $product->id }}" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-80 flex items-center justify-center hidden z-0">
        <div class="bg-zinc-800 rounded-lg p-8 max-w-xl w-full flex z-1">
            <div class="w-1/2">
                <img src="/img/image{{ $product->id }}.jpg" alt="Product Image" class="w-full h-auto object-cover object-center">
            </div>
            <div class="w-1/2 pl-4">
                <button data-product-id="{{ $product->id }}" class="close-product-popup float-right text-gray-400 hover:text-white" id="close-product-popup">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <h2 class="text-2xl font-semibold text-white mb-4">{{ $product->name }}</h2>
                <p class="mb-6 text-gray-400">Uitgebreide informatie over het product.</p>
                <button class="bg-favocrew_darkgrey text-white px-4 py-2 rounded-lg hover:bg-favocrew_grey transition duration-300 ease-in-out" onclick="addToCart({{ $product->id }}, 1)">
                    Toevoegen aan Winkelwagen
                </button>
            </div>
        </div>
    </div>
    @endforeach

</div>
</div>
    <div id="cart-popup" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-80 flex items-center justify-center hidden">
        <div class="bg-zinc-800 rounded-lg p-8 max-w-md w-full">
            <button id="close-cart-popup" class="float-right text-gray-400 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h2 class="text-2xl font-semibold text-white mb-4">Winkelwagen</h2>
            <!-- Producten in de winkelwagen (pas dit aan op basis van je gegevens) -->
            @if ($cart)
            
         @foreach ($cart as $product)

         @php

// get product by id


         @endphp
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="img/image2.jpg" alt="Product 2" class="w-12 h-12 object-cover object-center rounded-md">
                    <div class="ml-4">
                        <p class="text-gray-400">Product 2</p>
                        <p class="text-gray-400">Prijs: €30</p>
                        <p class="text-gray-400">Aantal: 1</p>
                    </div>
                </div>
                <button class="text-red-500 hover:text-red-600" onclick="removeFromCart({{ $product['productid'] }})">
                    Verwijderen
                </button>
            </div>
            @endforeach

            @else

            <p class="text-gray-400 p- mb-2">Er zijn nog geen producten in je winkelwagen.</p>
            @endif
            <!-- Einde Producten in de winkelwagen -->
            <a href="/payment">
                <button class="bg-favocrew_darkgrey text-white px-4 py-2 rounded-lg hover:bg-favocrew_grey transition duration-300 ease-in-out mt-4">
                    Afrekenen
                </button>
            </a>

        </div>
    </div>

    <script>

    </script>

</x-guest-layout>