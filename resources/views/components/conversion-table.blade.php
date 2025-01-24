@php
    $conversionsUnit = [1, 25, 50, 75];
    $conversionsCurrency = ['USD', 'EUR', 'JPY', 'THB', 'INR'];
    $currencySvg = [
        'USD' => asset('img/usa.png'),
        'EUR' => asset('img/uk.png'),
        'JPY' => asset('img/japan.png'),
        'INR' => asset('img/india.png'),
        'THB' => asset('img/thailand.png'),
    ];
    $selectedCur = 'USD';

    $filterCurrency = array_filter($rate['data'], function ($value) {
        return $value != 1;
    });

    $selectedCur = array_filter($rate['data'], function ($value) {
        return $value == 1;
    });

@endphp

{{-- @dd(array_key_first($selectedCur)) --}}

<div class="relative overflow-x-auto">

    <form action="{{ route('rate') }}" id="currency-select" class="max-w-sm w-fit ml-auto my-5 flex items-center gap-3">
        {{-- @csrf --}}
        <label for="currency-dropdown" class="sr-only">Select Currency</label>
        <!-- Currency Flag -->
        <img id="currency-flag" class="w-[32px] h-[32px]" src="{{ $currencySvg[array_key_first($selectedCur)] }}"
            alt="Flag">
        <!-- Currency Dropdown -->
        <select onchange="this.form.submit()" name="from" id="currency-dropdown"
            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
            @foreach ($conversionsCurrency as $currency)
                <option value="{{ $currency }}" @if ($currency === array_key_first($selectedCur)) selected @endif>
                    {{ $currency }}
                </option>
            @endforeach
        </select>
    </form>

    <!-- Currency Table -->
    <table id="table"
        class="w-full
                    text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-lg text-gray-900 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Currency</th>
                @foreach ($conversionsUnit as $unit)
                    <th scope="col" class="px-6 py-3 font-number text-end">{{ $unit }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody id="curTable" class="font-number text-black">

            @foreach ($filterCurrency as $key => $value)
                <tr id="curOpt-{{ $key }}" class="bg-white dark:bg-gray-800 text-end">
                    <th scope="row"
                        class="px-6 py-4 mx-auto font-medium text-gray-900 whitespace-nowrap dark:text-white text-center flex items-center justify-start gap-3">
                        <img class="w-[32px] h-[32px]" src="{{ $currencySvg[$key] }}" alt="Flag">
                        {{ $key }}
                    </th>
                    @foreach ($conversionsUnit as $unit)
                        <td class="px-6 py-4">{{ round($unit * $value, 4) }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
