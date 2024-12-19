<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    // Display list of tasks
    public function index()
    {
        $activeTasks = Task::where('completed', false)->get();
        $completedTasks = Task::where('completed', true)->get();

        return view('tasks.index', compact('activeTasks', 'completedTasks'));
    }

    // Show task creation form
    public function create()
    {
        return view('tasks.create');
    }

    // Store new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'category' => 'required|string',
        ]);

        Task::create([
            'title' => $request->title,
            'deadline' => $request->deadline ?? 'No alert',
            'category' => $request->category,
            'completed' => false,
        ]);

        return redirect()->route('tasks.index');
    }

    // Edit an existing task
    public function edit($id)
    {
        $task = Task::findOrFail($id);
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

        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->title,
            'deadline' => $request->deadline ?? 'No alert',
            'category' => $request->category,
        ]);

        return redirect()->route('tasks.index');
    }

    // Show confirmation before deleting a task
    public function confirmDelete($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.delete', compact('task'));
    }

    // Delete a task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }

    // Mark a task as complete
    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = true;
        $task->save();

        return redirect()->route('tasks.index');
    }

    // Dashboard
    public function dashboard()
    {
        // Fetch all tasks from the database
        $tasks = Task::all();
    
        // Calculate task statistics
        $totalTasks = $tasks->count();
        $tasksDueToday = Task::whereDate('deadline', now()->toDateString())->where('completed', false)->count();
        $completedTasks = $tasks->where('completed', true)->count();
        $overdueTasks = Task::where('deadline', '<', now()->toDateString())->where('completed', false)->count();
    
        // Group tasks by category
        $tasksByCategory = Task::select('category', \DB::raw('count(*) as count'))
            ->groupBy('category')
            ->get();
    
        // Return the view with calculated data
        return view('dashboard', compact('tasks', 'totalTasks', 'tasksDueToday', 'completedTasks', 'overdueTasks', 'tasksByCategory'));
    }
    
}
