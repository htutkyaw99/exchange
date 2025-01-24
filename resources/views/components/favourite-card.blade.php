@props(['value' => []])

@if (!empty($value))
    <div
        class="relative w-full max-w-sm sm:max-w-xl md:max-w-3xl px-6 py-8 bg-white border-2 border-blue-500 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 space-y-3 sm:flex sm:items-center sm:justify-between">
        <div class="sm:max-w-[60%] md:max-w-[70%] w-full">
            <h1 class="text-xl mb-3">
                <span
                    class="absolute -top-4 left-5 bg-blue-700 text-white text-md font-medium me-2 px-5 py-1 rounded-xl dark:bg-blue-900 dark:text-blue-300 font-number">{{ $value['date'] }}</span>
                <span class="font-number mr-2">{{ $value['amount'] }}</span>{{ $value['from'] }}
                equals to
            </h1>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-number font-bold"><span
                    class="font-number font-bold">{{ $value['result'] }}
                </span> {{ $value['to'] }}</h2>
        </div>

        <div class="sm:max-w-[40%] md:max-w-[30%] w-full">
            <p class="flex-1">Current Rate : </p>
            <p><span class="font-bold text-lg"><span class="font-number" id="amount">1</span>
                    {{ $value['from'] }} = <span class="font-number"
                        id="result">{{ $value['current_rate'] ?? '' }}</span>
                    {{ $value['to'] }}</span></p>
            <p><span class="font-bold text-lg"><span class="font-number" id="amount">1</span>
                    {{ $value['to'] }} = <span class="font-number" id="result">{{ $value['reverse_rate'] }}</span>
                    {{ $value['from'] }}</span></p>
        </div>
    </div>
@endif
