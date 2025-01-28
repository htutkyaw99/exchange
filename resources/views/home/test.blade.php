<x-layout>
    <div class="min-h-[650px] mt-[32px] px-0 sm:px-4">
        <div
            class="sm:mt-0 max-w-sm sm:max-w-xl md:max-w-screen-md lg:max-w-screen-lg p-5 flex-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto">
            <div class="flex gap-3">
                <x-conversioncal />
                <x-chart :rates="$rates" />
            </div>
        </div>
    </div>
</x-layout>
