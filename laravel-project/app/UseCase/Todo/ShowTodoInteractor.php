<?php

namespace App\UseCase\Todo;

use App\Models\Todo;

class ShowTodoInteractor
{
    public function handle(ShowTodoInput $input): ShowTodoOutput
    {
        $todo = Todo::findOrFail($input->getTodoId());
        return new ShowTodoOutput($todo);
    }
}