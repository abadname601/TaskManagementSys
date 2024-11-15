<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <!-- Check if user is authenticated  -->
                    @if (auth()->check())
                        <a href="{{ route('user-dashboard', ['userId' => auth()->user()->id]) }}" 
                           class="text-blue-500 hover:underline mt-4 inline-block">
                            Go to User Dashboard
                        </a>
                    @else
                        <p>Please log in to access your dashboard.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
