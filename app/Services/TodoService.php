<?php

namespace App\Services;

use App\Http\Resources\Todo\TodoCollection;
use App\Models\Todo;
use App\Repositories\TodoRepository;
use App\TodoCreateDto;
use App\TodoUpdateDto;

final class TodoService
{
    private TodoRepository $todoRepository;
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }
    public function index()
    {
        return new TodoCollection($this->todoRepository->findAll());
    }
    public function create(TodoCreateDto $request)
    {
        $todo = new Todo();
        $todo->title = $request->getTitle();
        $todo->body = $request->getBody();
        $todo->user_id = $request->getUserId();
        if(!$todo->save()){
            return false;
        }
        return true;
    }

    public function update(TodoUpdateDto $request,Todo $todo)
    {
        if($this->isTodoOwner($todo)){
            $todo->update([
                'title' => $request->getTitle(),
                'body' => $request->getBody()
            ]);
            return true;
        }else{
            return false;
        }
    }
    public function show(Todo $todo)
    {

    }

    public function delete(Todo $todo)
    {

    }
    public function isTodoOwner(Todo $todo)
    {
        return auth()->id() === $todo->user_id;
    }
}
