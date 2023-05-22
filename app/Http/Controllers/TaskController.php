<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->input('name');
        $task->user_id = auth()->id();
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function create()
    {
        return view('tasks.create');
    }
}
