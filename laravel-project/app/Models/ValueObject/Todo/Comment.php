<?php

namespace App\Models\ValueObject\Todo;

class Comment
{
    private ?string $comment;

    public function __construct(?string $comment)
    {
        if ($comment === '') {
            throw new \InvalidArgumentException;
        }

        $this->comment = $comment;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

        public function __toString()
    {
        return (string) $this->comment;
    }
}