<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-lg flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/">
            <h1 class="font-bold text-3xl"><span class="text-blue-600">X</span>Change</h1>
        </a>
        @auth
            <div class="flex items-center gap-3">
                <a href="{{ route('favourite') }}">
                    <svg class="w-6 h-6 hover:fill-black transition-colors text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m17 21-5-4-5 4V3.889a.92.92 0 0 1 .244-.629.808.808 0 0 1 .59-.26h8.333a.81.81 0 0 1 .589.26.92.92 0 0 1 .244.63V21Z" />
                    </svg>
                </a>
                <form method="POST" action="{{ route('login.destroy') }}">
                    @csrf
                    <button type="submit" class="text-xl hover:underline">Log
                        Out</button>
                </form>
            </div>
        @endauth
        @guest
            <div class="flex items-center gap-3 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a type="button" href="{{ route('login') }}"
                    class="text-white cursor-pointer bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-3 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get
                    Started</a>
            </div>
        @endguest
    </div>
</nav>
