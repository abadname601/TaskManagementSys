<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>WELCOME</h1>
                    <p>Enjoy your visit here.</p>

                    @auth
                        <p>You are logged in! Go to your <a href="{{ route('dashboard') }}" class="inline-block border border-blue-500 text-blue-700 font-semibold px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition-colors duration-200 mt-4">Dashboard</a>.</p>
                    @else
                        <p>Please <a href="{{ route('login') }}" class="inline-block border border-blue-500 text-blue-700 font-semibold px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition-colors duration-200 mt-4">log in</a> or <a href="{{ route('register') }}" class="inline-block border border-blue-500 text-blue-700 font-semibold px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition-colors duration-200 mt-4">register</a> to access more features.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
