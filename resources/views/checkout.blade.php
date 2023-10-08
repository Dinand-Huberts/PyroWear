<x-guest-layout>

        <form class="bg-zinc-800 text-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 p-4 mt-24 border-[1px] border-favocrew_red" method="POST">
            @csrf
            <h1 class="text-2xl font-semibold text-gray-300 mb-4 p-2">Afrekenen</h1>
            <div class="mb-4 flex flex-wrap -mx-2">
            <div class="w-full md:w-1/2 px-2 mb-6">
                <label class="block text-zinc-100 text-sm font-bold mb-2" for="naam">
                    Naam
                </label>
                <input class="appearance-none border border-favocrew_red rounded w-full flex py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" placeholder="Volledige Naam">
            </div>
            <div class="w-full md:w-1/2 px-2 mb-6">
                <label class="block text-zinc-100 text-sm font-bold mb-2" for="adres">
                    Adres
                </label>
                <input class="appearance-none border border-favocrew_red rounded w-full flex py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="adress" placeholder="Straatnaam en Huisnummer">
            </div>
            <div class="w-full md:w-1/2 px-2 mb-6">
                <label class="block text-zinc-100 text-sm font-bold mb-2" for="postcode">
                    Postcode
                </label>
                <input class="appearance-none border border-favocrew_red rounded w-full flex py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="zipcode" placeholder="1234 AB">
            </div>
            <div class="w-full md:w-1/2 px-2 mb-6">
                <label class="block text-zinc-100 text-sm font-bold mb-2" for="stad">
                    Stad
                </label>
                <input class="appearance-none border border-favocrew_red rounded w-full flex py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="city" placeholder="Plaatsnaam">
            </div>
            <div class="w-full px-2 mb-6">
                <label class="block text-zinc-100 text-sm font-bold mb-2" for="email">
                    E-mail
                </label>
                <input class="appearance-none border border-favocrew_red rounded w-full flex py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" placeholder="voorbeeld@example.com">
            </div>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-favocrew_darkgrey text-white px-4 py-2 rounded-full hover:bg-favocrew_grey transition duration-300 ease-in-out">
                    Afrekenen
                </button>
            </div>
        </form>
    
</x-guest-layout>