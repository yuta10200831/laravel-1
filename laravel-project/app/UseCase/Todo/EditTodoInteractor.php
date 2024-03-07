<?php

namespace App\UseCase\Todo;

use App\Models\Todo;

class EditTodoInteractor
{
    public function handle(EditTodoInput $input): EditTodoOutput
    {
        $todo = Todo::find($input->getTodoId());
        $todo->update([
            'todo' => $input->getTodo(),
            'deadline' => $input->getDeadline(),
            'comment' => $input->getComment(),
        ]);

        return new EditTodoOutput($todo);
    }
}