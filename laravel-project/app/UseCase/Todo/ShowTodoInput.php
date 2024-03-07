<?php

namespace App\UseCase\Todo;

class ShowTodoInput
{
    private int $todo_id;

    public function __construct(int $todo_id)
    {
        $this->todo_id = $todo_id;
    }

    public function getTodoId(): int
    {
        return $this->todo_id;
    }
}