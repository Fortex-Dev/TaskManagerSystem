<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Redirect;
use Symfony\Contracts\Service\Attribute\Required;

class TaskController extends Controller
{
    public function index(Request $request)
    { 
        $query = Task::query();
        if
        ($request->filled('search')) {
            $query->where('title','like','%'.$request->search.'%');
        }
        $tasks = $query->get();
        return view('admin.tasks.index', compact('tasks'));
    }
    public function show(Task $task)
    {
        return view('admin.tasks.show',compact('task'));
    }

    public function create()
    {
        return view('admin.tasks.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
            'priority' => 'required|in:low,medium,hight',
            'due_date' => 'nullable|date'
        ]);
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
        ]);
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('admin.tasks.edit',compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
            'priority' => 'required|in:low,medium,hight',
            'due_date' => 'nullable|date'
        ]);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
        ]);
        return redirect()->route('tasks.index');
    }
    public function complete(Task $task)
    {
        $task->update(['status' => 'completed']);
        return back()->with('success', 'Task marked as completed.');
    }
public function destroy(Task $task)
{
    $task->delete();

    return redirect()->route('tasks.index');


}

public function dashboard()
{
    $totalTasks = Task::count();
    $pendingTasks = Task::where('status','pending')->count();
    $inProgressTasks = Task::where('status','in_progress')->count();
    $completedTasks = Task::where('status','completed')->count();

    $recentTasks = Task::orderBy('created_at' , 'DESC')->take(5)->get();
    return view('admin.dashborad',compact('totalTasks','pendingTasks','inProgressTasks','completedTasks','recentTasks'));
}
}

