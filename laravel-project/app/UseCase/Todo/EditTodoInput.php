<?php

namespace App\UseCase\Todo;

use App\Models\ValueObject\Todo\TodoValue;
use App\Models\ValueObject\Todo\Deadline;
use App\Models\ValueObject\Todo\Comment;

class EditTodoInput
{
    private int $todo_id;
    private TodoValue $todo;
    private Deadline $deadline;
    private Comment $comment;

    public function __construct(int $todo_id, TodoValue $todo, Deadline $deadline, Comment $comment)
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

    public function getTodo(): TodoValue
    {
        return $this->todo;
    }

    public function getDeadline(): Deadline
    {
        return $this->deadline;
    }

    public function getComment(): Comment
    {
        return $this->comment;
    }
}