<?php

namespace App\UseCase\Todo;

use App\Models\Todo;

class CreateTodoInteractor
{
    public function handle(CreateTodoInput $input): CreateTodoOutput
    {
        $todo = Todo::create([
            'user_id' => $input->getUserId(),
            'todo' => $input->getTodo(),
            'deadline' => $input->getDeadline(),
            'comment' => $input->getComment(),
        ]);

        return new CreateTodoOutput($todo);
    }
}