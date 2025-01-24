<x-auth-layout>
    <form action="{{ route('login.store') }}" method="POST" class="max-w-sm mx-auto flex-1">
        @csrf
        <h1 class="text-gray-900 font-bold text-3xl mb-5">Welcome back</h1>
        <p class="mb-5 text-sm font-medium text-gray-500 dark:text-white">Welcome back! Please enter your details.</p>
        @error('credentials')
            <p class="mb-5 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
        @enderror
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter your email" name="email" value="{{ old('email') }}" />
            @error('email')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Password" name="password" />
            @error('password')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <a href="{{ route('password.request') }}"
                class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Forget
                password?</a>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-5">Login</button>
        <p class="mb-5 text-sm text-center font-medium text-gray-500 dark:text-white">Dont't have an account?<span
                class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                <a href="{{ route('register.form') }}">
                    Sign up for free
                </a>
            </span></p>
    </form>
</x-auth-layout>
