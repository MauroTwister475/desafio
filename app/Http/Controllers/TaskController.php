<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    // Listar todas as tarefas
    public function index(Request $request)
{
    $query = Task::query();

    // Filtrar por status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Obter tarefas com paginação
    $tasks = $query->paginate(10); // Você pode ajustar o número de tarefas por página

    return view('tasks.index', compact('tasks'));
}

    // Mostrar o formulário de criação de tarefa
    public function create()
    {
        return view('tasks.create');
    }

    // Salvar uma nova tarefa
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required|in:pending,completed',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
                        ->with('success', 'Tarefa criada com sucesso.');
    }

    // Mostrar uma única tarefa
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Mostrar o formulário de edição de uma tarefa
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Atualizar uma tarefa
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required|in:pending,completed',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
                        ->with('success', 'Tarefa atualizada com sucesso.');
    }

    // Excluir uma tarefa
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
                        ->with('success', 'Tarefa excluída com sucesso.');
    }
}
