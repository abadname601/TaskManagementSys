<x-app-layout>
    <!-- Page Content -->
    <div class="container mx-auto mt-6 max-w-3xl bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-2xl font-semibold text-gray-800">Are you sure you want to delete this task?</h3>
        <div class="alert alert-warning mt-4 text-yellow-600">
            <strong>Warning:</strong> This action cannot be undone.
        </div>

        <!-- Form to confirm deletion -->
        <form action="{{ route('tasks.delete.confirmed', $task['id']) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="mt-6">
                <button type="submit" class="btn btn-danger text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Yes, Delete</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-4">No, Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
