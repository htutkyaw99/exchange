@props(['value' => []])

{{-- @dd($value) --}}

@if (!empty($value))
    <div
        class="relative max-w-sm sm:max-w-xl md:max-w-screen-md lg:max-w-screen-lg p-6 bg-white border-2 border-blue-500 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 space-y-3">
        <span
            class="absolute -top-4 left-5 bg-blue-700 text-white text-md font-medium me-2 px-5 py-1 rounded-xl dark:bg-blue-900 dark:text-blue-300 font-number">{{ $value['date'] }}</span>
        <h1 class="text-xl"><span class="font-number mr-2">{{ $value['amount'] }}</span>{{ $value['from'] }}
            equals
            to
        </h1>
        <h2 class="font-number font-bold text-3xl sm:text-4xl lg:text-5xl"><span
                class="font-number font-bold ">{{ $value['result'] }}
            </span> {{ $value['to'] }}</h2>
        <div class="flex items-center justify-between">
            <div>
                <p class="">Current Rate : </p>
                <p><span class="font-bold text-lg"><span class="font-number" id="amount">1</span>
                        {{ $value['from'] }} = <span class="font-number"
                            id="result">{{ $value['current_rate'] ?? '' }}</span>
                        {{ $value['to'] }}</span></p>
                <p><span class="font-bold text-lg"><span class="font-number" id="amount">1</span>
                        {{ $value['to'] }} = <span class="font-number"
                            id="result">{{ $value['reverse_rate'] }}</span>
                        {{ $value['from'] }}</span></p>
            </div>
            <form action="{{ route('save') }}" method="POST">
                @csrf
                <input type="hidden" name="from" value="{{ $value['from'] }}">
                <input type="hidden" name="to" value="{{ $value['to'] }}">
                <input type="hidden" name="amount" value="{{ $value['amount'] }}">
                <input type="hidden" name="result" value="{{ $value['result'] }}">
                <input type="hidden" name="current_rate" value="{{ $value['current_rate'] }}">
                <input type="hidden" name="reverse_rate" value="{{ $value['reverse_rate'] }}">
                <input type="hidden" name="date" value="{{ $value['date'] }}">
                <button type="submit">
                    <svg class="w-10 h-10 text-gray-800 dark:text-white hover:fill-black transition-colors"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
@endif
