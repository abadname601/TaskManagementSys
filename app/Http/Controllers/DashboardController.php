<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon; // Import Carbon for date manipulation

class DashboardController extends Controller
{
    // Main dashboard with tasks
    public function index()
    {
        // Fetch tasks for the logged-in user and format the due_date field
        $tasks = Task::where('user_id', auth()->id())
                     ->get()
                     ->map(function($task) {
                         // Format the due_date to YYYY-MM-DD format for FullCalendar
                         $task->due_date = Carbon::parse($task->due_date)->toDateString();
                         return $task;
                     });

        // If no tasks are found, you can return a message or handle it accordingly
        if ($tasks->isEmpty()) {
            // Optionally handle empty tasks, e.g.:
            // session()->flash('message', 'No tasks found.');
        }

        return view('dashboard', compact('tasks'));
    }

    // User-specific dashboard
    public function show($id)
    {
        // Ensure the user exists and retrieve their tasks
        $tasks = Task::where('user_id', $id)->get()->map(function($task) {
            // Format the due_date to YYYY-MM-DD format for FullCalendar
            $task->due_date = Carbon::parse($task->due_date)->toDateString();
            return $task;
        });

        // If no tasks are found, you can return a message or handle it accordingly
        if ($tasks->isEmpty()) {
            // Optionally handle empty tasks, e.g.:
            // session()->flash('message', 'No tasks found.');
        }

        return view('user-dashboard', ['userId' => $id, 'tasks' => $tasks]);
    }
}
