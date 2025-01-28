<x-layout>
    <div class="min-h-[650px] mt-[32px] px-4">
        <div
            class="sm:mt-0 max-w-sm sm:max-w-xl md:max-w-screen-md lg:max-w-screen-lg p-5 flex-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto">
            <div class="">
                <x-tab />
            </div>

            <x-conversioncal />

            @if (isset($value))
                <x-exchange-card :value="$value" />
            @endif

            {{-- <x-conversion-table /> --}}

        </div>

        {{-- <x-conversion-table /> --}}
    </div>
    <script>
        const switcher = document.getElementById('switch');
        const selectOne = document.getElementById('from');
        const selectTwo = document.getElementById('to');

        switcher.addEventListener('click', function() {
            const index = selectOne.selectedIndex;
            selectOne.selectedIndex = selectTwo.selectedIndex;
            selectTwo.selectedIndex = index;
        });

        const calbtn = document.getElementById('cal-btn');
        const conFrom = document.getElementById('conversion-form');

        conFrom.addEventListener('submit', function() {
            calbtn.disabled = true
            calbtn.innerText = 'Loading . . .'
        })
    </script>
</x-layout>
