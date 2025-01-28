<form class="" id="conversion-form" action="{{ route('convert') }}" method="POST">
    @csrf
    <div class="flex flex-col sm:flex-row items-center gap-5">
        <div class="mb-5 flex-1">
            <label for="from" class="block mb-2 text-xl font-medium text-gray-500 dark:text-white">From</label>
            <div class="max-w-lg mx-auto flex mb-5">
                <select id="from" name="from_currency"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg block flex-1 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-0 focus:border-0">
                    <option value="EUR" {{ isset($value['from']) && $value['from'] == 'EUR' ? 'selected' : '' }}>
                        EUR - Euro
                    </option>
                    <option value="USD" {{ isset($value['from']) && $value['from'] == 'USD' ? 'selected' : '' }}>
                        USD - US Dollar
                    </option>
                    <option value="JPY" {{ isset($value['from']) && $value['from'] == 'JPY' ? 'selected' : '' }}>
                        JPY - Japanese Yen
                    </option>
                    <option value="INR" {{ isset($value['from']) && $value['from'] == 'INR' ? 'selected' : '' }}>
                        INR - Indian Rupee
                    </option>
                    <option value="THB" {{ isset($value['from']) && $value['from'] == 'THB' ? 'selected' : '' }}>
                        THB - Thai Baht
                    </option>
                </select>
            </div>
            <input name="amount" type="number" value="{{ $value['amount'] ?? 1 }}"
                class="w-full text-5xl font-number border-0 border-b-2 focus:border-b-indigo-500 focus:ring-0 outline-0">
        </div>
        <div>
            <button id="switch" type="button" class="rounded-full p-3 hover:bg-slate-100 transition-colors">
                <svg class="w-8 h-8 text-gray-800 dark:text-white " aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3" />
                </svg>
            </button>
        </div>
        <div class="mb-5 flex-1">
            <label for="to" class="block mb-2 text-xl font-medium text-gray-500 dark:text-white">Converted
                to</label>
            <div class="max-w-lg mx-auto flex mb-5">
                <select id="to" name="to_currency"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg block flex-1 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-0 focus:border-0">
                    <option value="EUR" {{ isset($value['to']) && $value['to'] == 'EUR' ? 'selected' : '' }}>
                        EUR - Euro
                    </option>
                    <option selected value="USD"
                        {{ isset($value['to']) && $value['to'] == 'USD' ? 'selected' : '' }}>
                        USD - US Dollar
                    </option>
                    <option value="JPY" {{ isset($value['to']) && $value['to'] == 'JPY' ? 'selected' : '' }}>
                        JPY - Japanese Yen
                    </option>
                    <option value="INR" {{ isset($value['to']) && $value['to'] == 'INR' ? 'selected' : '' }}>
                        INR - Indian Rupee
                    </option>
                    <option value="THB" {{ isset($value['to']) && $value['to'] == 'THB' ? 'selected' : '' }}>
                        THB - Thai Baht
                    </option>

                </select>
                </select>
            </div>
            <input type="number" class="w-full border-0 outline-0 text-5xl font-number"
                value="{{ $value['result'] ?? '0.00' }}" disabled>
        </div>
    </div>
    <div class="flex justify-end items-center mb-5">
        <button id="cal-btn" type="submit"
            class="text-white bg-blue-700 disabled:bg-slate-800 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-md px-5 py-3 text-center  mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Convert</button>
    </div>
</form>
