<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Welcome to the user-dashboard, {{ $userId }}!</h1>
                    
                
                    <p>This page is under development...</p>

                 
                    <a href="{{ route('dashboard') }}" class="inline-block border border-blue-500 text-blue-700 font-semibold px-4 py-2 rounded hover:bg-blue-500 hover:text-white transition-colors duration-200 mt-4">
                        Back to Dashboard
                    </a>

                    <form action="{{ route('logout') }}" method="POST" style="margin-top: 10px;">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors duration-200">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
