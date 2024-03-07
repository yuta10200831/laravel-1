<?php

namespace App\UseCase\Todo;

use App\Models\ValueObject\Todo\TodoValue;
use App\Models\ValueObject\Todo\Deadline;
use App\Models\ValueObject\Todo\Comment;

class CreateTodoInput
{
    private int $user_id;
    private TodoValue $todo;
    private Deadline $deadline;
    private Comment $comment;

    public function __construct(int $user_id, TodoValue $todo, Deadline $deadline, Comment $comment)
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