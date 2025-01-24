<x-auth-layout>
    <form action="{{ route('password.email') }}" method="POST" class="max-w-sm mx-auto flex-1">
        @csrf
        <h1 class="text-gray-900 font-bold text-3xl mb-5">Forgot password?</h1>
        {{-- <p class="mb-5 text-sm font-medium text-gray-500 dark:text-white">Welcome back! Please enter your details.</p> --}}
        @error('credentials')
            <p class="mb-5 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
        @enderror
        @if (session('status'))
            <p class="mb-5 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ session('status') }}</p>
        @endif
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter your email" name="email" value="{{ old('email') }}" />
            @error('email')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-5">Reset
            password</button>
        <p class="mb-5 text-sm text-center font-medium text-gray-500 dark:text-white">
        <div class="flex items-center justify-center">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
            <a href="{{ route('login') }}">
                Back
                to login
            </a>
        </div>
        </p>
    </form>
</x-auth-layout>
