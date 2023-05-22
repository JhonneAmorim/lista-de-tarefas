<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        // Aqui você pode adicionar a lógica para buscar as tarefas do usuário
        $tasks = auth()->user()->tasks;

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->input('name');
        $task->user_id = auth()->id();
        $task->save();

        return redirect()->route('tasks.index');
    }
}
