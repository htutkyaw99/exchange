<x-layout>
    {{-- card --}}
    {{-- <h1>Live exchange rates at your fingertips</h1> --}}
    {{-- @dd($apiData['conversion_rates']) --}}
    <div class="min-h-[650px] mt-[32px] px-0 sm:px-4">
        <div
            class="mt-28 mx-auto sm:mt-0 max-w-sm sm:max-w-xl md:max-w-screen-md lg:max-w-screen-lg p-5 flex-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="">
                <x-tab />
            </div>

            <x-conversion-table :rate="$rate" />

            {{-- <x-chart /> --}}

        </div>
    </div>
    <script></script>
</x-layout>
