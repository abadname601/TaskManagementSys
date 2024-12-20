<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center items-center">
        <div class="bg-white shadow-sm rounded-lg px-8 py-6 w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 text-center">
            <h1 class="text-2xl font-bold">Welcome to TaskMaster!</h1>
            <p class="mt-4">Your ultimate partner in staying organized and productive.</p>

            @auth
                <p class="mt-6">
                    You are logged in! Go to your 
                    <a href="{{ route('dashboard') }}" class="inline-block border border-blue-500 text-blue-700 font-semibold px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition-colors duration-200">
                        Dashboard
                    </a>.
                </p>
            @else
                <p class="mt-6">
                    Please 
                    <a href="{{ route('login') }}" class="inline-block border border-blue-500 text-blue-700 font-semibold px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition-colors duration-200">
                        log in
                    </a> 
                    or 
                    <a href="{{ route('register') }}" class="inline-block border border-blue-500 text-blue-700 font-semibold px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition-colors duration-200">
                        register
                    </a> 
                    to access more features.
                </p>
            @endauth
        </div>
    </div>
</x-app-layout>
