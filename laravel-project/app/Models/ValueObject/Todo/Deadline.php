<?php

namespace App\Models\ValueObject\Todo;

class Deadline
{
    private \DateTimeImmutable $deadline;

    public function __construct(string $deadline)
    {
        try {
            $this->deadline = new \DateTimeImmutable($deadline);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException;
        }
    }

    public function getDeadline(): \DateTimeImmutable
    {
        return $this->deadline;
    }

    public function __toString(): string
    {
        return $this->deadline->format('Y-m-d H:i:s');
    }
}