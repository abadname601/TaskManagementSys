<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-800">Create New Task</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                        
                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                                required>
                        </div>

                        <!-- Deadline -->
                        <div class="mb-4">
                            <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline (Optional)</label>
                            <input 
                                type="date" 
                                name="deadline" 
                                id="deadline" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select 
                                name="category" 
                                id="category" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                                required>
                                <option value="Work">Work</option>
                                <option value="School">School</option>
                                <option value="Personal">Personal</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Alert Date (optional) -->
                        <div class="mb-4">
                            <label for="alert_date" class="block text-sm font-medium text-gray-700">Alert Date (Optional)</label>
                            <input 
                                type="date" 
                                name="alert_date" 
                                id="alert_date" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <p class="text-sm text-gray-500">Leave blank if no alert is needed.</p>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button 
                                type="submit" 
                                class="px-4 py-2 rounded bg-blue-500 text-black hover:bg-blue-600 transition duration-200">
                                Create Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
