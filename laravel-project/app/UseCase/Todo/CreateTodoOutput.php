<?php

namespace App\UseCase\Todo;

use App\Models\Todo;

class CreateTodoOutput
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function getTodo()
    {
        return $this->todo;
    }
}