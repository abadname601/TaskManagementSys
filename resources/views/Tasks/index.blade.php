<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-800">My Tasks</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Active Tasks -->
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Active Tasks</h2>
                    @if (count($activeTasks) > 0)
                        <ul class="task-list space-y-4">
                            @foreach ($activeTasks as $task)
                                <li class="task-item bg-white p-4 rounded-lg shadow-md flex justify-between items-center">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-800">{{ $task['title'] }}</h3>
                                        <p class="text-sm text-gray-600">Deadline: <strong>{{ $task['deadline'] }}</strong></p>
                                        <p class="text-sm text-gray-600">Category: <strong>{{ $task['category'] }}</strong></p>
                                    </div>
                                    <div class="actions flex gap-2">
                                        <a href="/tasks/edit/{{ $task['id'] }}" class="edit px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 transition duration-200">Edit</a>
                                        <a href="/tasks/delete/{{ $task['id'] }}" class="delete px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600 transition duration-200">Delete</a>
                                        <a href="/tasks/complete/{{ $task['id'] }}" class="complete px-4 py-2 rounded bg-green-500 text-white hover:bg-green-600 transition duration-200">Done</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No active tasks available.</p>
                    @endif

                    <!-- Completed Tasks -->
                    <h2 class="text-lg font-semibold text-gray-800 mb-4 mt-8">Completed Tasks</h2>
                    @if (count($completedTasks) > 0)
                        <ul class="task-list space-y-4">
                            @foreach ($completedTasks as $task)
                                <li class="task-item bg-white p-4 rounded-lg shadow-md flex justify-between items-center">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-800">{{ $task['title'] }}</h3>
                                        <p class="text-sm text-gray-600">Completed on: <strong>{{ $task['deadline'] }}</strong></p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No completed tasks yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Floating + Button -->
    <a href="/tasks/create" class="fixed bottom-6 right-6 bg-blue-500 text-white rounded-full w-16 h-16 flex items-center justify-center text-3xl shadow-lg hover:bg-blue-600">
        +
    </a>

    <style>
        .task-list {
            list-style-type: none;
            padding: 0;
        }

        .task-item {
            background-color: #fff;
            padding: 16px;
            margin-bottom: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .actions a {
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            display: inline-block;
            transition: background-color 0.2s ease;
        }

        .actions .edit {
            background-color: #007bff;
            color: #fff;
        }

        .actions .edit:hover {
            background-color: #0056b3;
        }

        .actions .delete {
            background-color: #dc3545;
            color: #fff;
        }

        .actions .delete:hover {
            background-color: #c82333;
        }

        .actions .complete {
            background-color: #28a745;
            color: #fff;
        }

        .actions .complete:hover {
            background-color: #218838;
        }

        .fixed {
            position: fixed;
        }

        .bottom-6 {
            bottom: 24px;
        }

        .right-6 {
            right: 24px;
        }

        .bg-blue-500 {
            background-color: #3b82f6;
        }

        .bg-blue-600 {
            background-color: #2563eb;
        }

        .hover\:bg-blue-600:hover {
            background-color: #2563eb;
        }

        .text-white {
            color: white;
        }

        .rounded-full {
            border-radius: 9999px;
        }

        .w-16 {
            width: 4rem;
        }

        .h-16 {
            height: 4rem;
        }

        .text-3xl {
            font-size: 1.875rem;
        }

        .shadow-lg {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</x-app-layout>
