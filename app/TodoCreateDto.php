<?php

namespace App;

class TodoCreateDto
{
    private string $title;

    private string $body;
    private int $user_id;

    public function __construct(string $title, string $body, int $user_id)
    {
        $this->title = $title;
        $this->body = $body;
        $this->user_id = $user_id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }
}
