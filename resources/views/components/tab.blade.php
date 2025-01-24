<div class="text-lg mb-5 font-medium text-center text-gray-500 dark:text-gray-400 border-b border-slate-300">
    <ul class="flex w-fit mx-auto">
        <li class="me-2">
            <a href="{{ route('welcome') }}"
                class="{{ request()->routeIs('welcome') || request()->routeIs('convert') ? 'active-tab' : 'tab' }}">Conversion</a>
        </li>
        <li class="me-2">
            <a href="{{ route('rate') }}" class="{{ request()->routeIs('rate') ? 'active-tab' : 'tab' }}"
                aria-current="page">Today's Rate</a>
        </li>
    </ul>
</div>
