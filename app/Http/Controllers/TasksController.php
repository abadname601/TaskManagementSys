<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    // Display list of tasks
    public function index()
    {
        $tasks = [
            ['id' => 1, 'title' => 'Task 1', 'deadline' => '2024-12-05', 'category' => 'Work', 'completed' => false],
            ['id' => 2, 'title' => 'Task 2', 'deadline' => '2024-12-10', 'category' => 'School', 'completed' => false],
            // Add more tasks as needed
        ];

        // Separate completed tasks
        $completedTasks = array_filter($tasks, fn($task) => $task['completed'] == true);

        // Filter active tasks
        $activeTasks = array_filter($tasks, fn($task) => $task['completed'] == false);

        return view('tasks.index', compact('activeTasks', 'completedTasks'));
    }

    // Show task creation form
    public function create()
    {
        return view('tasks.create');
    }

    // Store new task (handle form submission)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'category' => 'required|string',
        ]);

        // Simulate saving the task (you will replace this with actual DB save logic)
        $task = [
            'id' => rand(1, 100), // Random id for example
            'title' => $request->title,
            'deadline' => $request->deadline ?? 'No alert',
            'category' => $request->category,
            'completed' => false
        ];

        // Redirect back to task list
        return redirect()->route('tasks.index');
    }

    // Edit an existing task
    public function edit($id)
    {
        // Simulate finding the task by its ID (replace with actual DB query)
        $task = [
            'id' => $id,
            'title' => 'Task ' . $id,
            'deadline' => '2024-12-05',
            'category' => 'Work',
            'completed' => false
        ];

        return view('tasks.edit', compact('task'));
    }

    // Update an existing task
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'category' => 'required|string',
        ]);

        // Simulate updating the task (replace with actual DB update logic)
        $updatedTask = [
            'id' => $id,
            'title' => $request->title,
            'deadline' => $request->deadline ?? 'No alert',
            'category' => $request->category,
            'completed' => false
        ];

        // Redirect back to task list
        return redirect()->route('tasks.index');
    }

    // Show confirmation before deleting a task
    public function confirmDelete($id)
    {
        // Simulate finding the task by its ID (replace with actual DB query)
        $task = [
            'id' => $id,
            'title' => 'Task ' . $id,
            'deadline' => '2024-12-05',
            'category' => 'Work',
            'completed' => false
        ];

        return view('tasks.delete', compact('task'));
    }

    // Delete a task after confirmation
    public function destroy($id)
    {
        // Implement task deletion logic here (e.g., delete from database)
        
        // For now, simulate deleting the task
        // In a real application, you would delete the task from the database.
        
        // Redirect back to task list
        return redirect()->route('tasks.index');
    }

    // Mark a task as complete
    public function complete($id)
    {
        // Logic for marking task as complete
        $tasks = session('tasks', []);
        $taskIndex = array_search($id, array_column($tasks, 'id'));

        if ($taskIndex !== false) {
            $tasks[$taskIndex]['completed'] = true;
            session(['tasks' => $tasks]);
        }

        return redirect()->route('tasks.index');
    }
}
