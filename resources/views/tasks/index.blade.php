@extends('layout')

@section('content')
    <h1>Tarefas</h1>

    <!-- Formulário de Filtro -->
    <form method="GET" action="{{ route('tasks.index') }}">
        <select name="status">
            <option value="">Todos</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pendente</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Concluída</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>

    <a href="{{ route('tasks.create') }}">Criar Nova Tarefa</a>

    @if ($tasks->isEmpty())
        <p>Não há tarefas disponíveis.</p>
    @else
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a>
                    ({{ $task->status }})
                    <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <!-- Paginação -->
        {{ $tasks->links() }}
    @endif
@endsection
