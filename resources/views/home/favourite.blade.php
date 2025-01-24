<x-layout>
    <div class="max-w-sm sm:max-w-xl md:max-w-3xl mx-auto lg:mx-0 space-y-8 mt-28">
        @if (isset($values))
            @foreach ($values as $card)
                <x-favourite-card :value="$card" />
            @endforeach
        @else
            <h1 class="text-3xl text-center font-bold w-full">There is not items yet!</h1>
        @endif
    </div>
</x-layout>
