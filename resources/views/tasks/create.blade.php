@extends('layout')

@section('content')
    <h1>Criar Nova Tarefa</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending">Pendente</option>
            <option value="completed">Concluída</option>
        </select>
        <button type="submit">Salvar</button>
    </form>
@endsection
