<?php

namespace App\UseCase\Todo;

use App\Models\Todo;

class EditTodoOutput
{
    private Todo $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function getTodo(): Todo
    {
        return $this->todo;
    }
}