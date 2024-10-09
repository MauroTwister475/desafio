<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    // Verifica se o usuário pode visualizar a tarefa
    public function view(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    // Verifica se o usuário pode atualizar a tarefa
    public function update(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    // Verifica se o usuário pode excluir a tarefa
    public function delete(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
