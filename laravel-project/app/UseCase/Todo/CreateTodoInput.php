<?php

namespace App\UseCase\Todo;

class CreateTodoInput
{
    private int $user_id;
    private string $todo;
    private string $deadline;
    private ?string $comment;

    public function __construct(int $user_id, string $todo, string $deadline, ?string $comment)
    {
        $this->user_id = $user_id;
        $this->todo = $todo;
        $this->deadline = $deadline;
        $this->comment = $comment;
    }

    public function getUserId(): int
    {
        return $this->user_id;
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