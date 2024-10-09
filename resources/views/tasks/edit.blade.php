@extends('layout')

@section('content')
    <h1>Editar Tarefa</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ $task->name }}" required>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pendente</option>
            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Concluída</option>
        </select>
        <button type="submit">Atualizar</button>
    </form>
@endsection
