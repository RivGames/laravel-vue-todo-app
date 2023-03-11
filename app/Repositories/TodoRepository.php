<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository extends Repository
{
    public function __construct(Todo $todo)
    {
        parent::__construct($todo);
    }
}
