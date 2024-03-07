<?php

namespace App\UseCase\Todo;

class EditTodoInput
{
    private int $todo_id;
    private string $todo;
    private string $deadline;
    private ?string $comment;

    public function __construct(int $todo_id, string $todo, string $deadline, ?string $comment)
    {
        $this->todo_id = $todo_id;
        $this->todo = $todo;
        $this->deadline = $deadline;
        $this->comment = $comment;
    }

    public function getTodoId(): int
    {
        return $this->todo_id;
    }

    public function getTodo(): string
    {
        return $this->todo;
    }

    public function getDeadline(): string
    {
        return $this->deadline;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }
}