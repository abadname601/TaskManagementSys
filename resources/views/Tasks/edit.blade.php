<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-800">Edit Task</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Edit Task Form -->
                    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Title Field -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
                            <input type="text" name="title" id="title" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   value="{{ old('title', $task->title) }}" required>
                        </div>

                        <!-- Deadline Field -->
                        <div class="mb-4">
                            <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                            <input type="date" name="deadline" id="deadline" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   value="{{ old('deadline', $task->deadline) }}" required>
                        </div>

                        <!-- Category Field -->
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category" id="category" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="Work" {{ $task->category == 'Work' ? 'selected' : '' }}>Work</option>
                                <option value="School" {{ $task->category == 'School' ? 'selected' : '' }}>School</option>
                                <option value="Personal" {{ $task->category == 'Personal' ? 'selected' : '' }}>Personal</option>
                                <option value="Other" {{ $task->category == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <!-- Alert Date Field (Optional) -->
                        <div class="mb-4">
                            <label for="alert_date" class="block text-sm font-medium text-gray-700">Alert Date (Optional)</label>
                            <input type="date" name="alert_date" id="alert_date" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                   value="{{ old('alert_date', $task->alert_date) }}">
                            <p class="text-sm text-gray-500">Leave blank if no alert is needed.</p>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end space-x-2">
                            <button type="submit" class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 transition duration-200"
                                    style="display:block; margin: 10px auto;">Update Task</button>

                            <!-- Done Button (only shows if task is not completed) -->
                            @if (!$task->completed)
                                <form method="POST" action="{{ route('tasks.complete', $task->id) }}" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-4 py-2 rounded bg-green-500 text-white hover:bg-green-600 transition duration-200">
                                        Mark as Done
                                    </button>
                                </form>
                            @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
