<?php

namespace App\Models\ValueObject\Todo;

class TodoValue
{
    private string $text;

    public function __construct(string $text)
    {
        if (empty($text)) {
            throw new \InvalidArgumentException('空では登録できません');
        }

        if (mb_strlen($text) > 255) {
            throw new \InvalidArgumentException('255文字以上では登録できません');
        }

        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function __toString()
    {
        return $this->text;
    }
}