<?php

namespace App\Services;

use App\Http\Resources\Todo\TodoCollection;
use App\Http\Resources\Todo\TodoResource;
use App\Models\Todo;
use App\Repositories\TodoRepository;
use App\TodoCreateDto;
use App\TodoUpdateDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

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
        if (!$todo->save()) {
            return new JsonResponse(['errors' => [
                [
                    'status' => '200',
                    'title' => 'Error',
                    'message' => 'Something went wrong...',
                ]
            ]
            ]);
        }
        return new JsonResponse(['data' => [
            [
                'status' => '200',
                'title' => 'Success',
                'message' => 'Task created successfully!',
            ]
        ]
        ]);
    }

    public function update(TodoUpdateDto $request, $id)
    {
        $todo = $this->todoRepository->findById($id);
        if(!$todo){
            return new JsonResponse(['errors' => [
                [
                    'status' => '404',
                    'title' => 'Resource not found',
                    'message' => 'Resource could not be found.',
                ]
            ]
            ],404);
        }
        if (!$this->isTodoOwner($id)) {
            return new JsonResponse(['errors' => [
                [
                    'status' => '403',
                    'title' => 'Resource not found',
                    'message' => 'Resource could not be updated.',
                ]
            ]
            ],403);
        }
        $todo->update([
            'title' => $request->getTitle(),
            'body' => $request->getBody()
        ]);
        return new JsonResponse(['data' => [
            [
                'status' => '200',
                'title' => 'Success',
                'message' => 'Task updated successfully!',
            ]
        ]
        ]);
    }

    public function show($id)
    {
        $todo = $this->todoRepository->findById($id);
        if (!$todo) {
            return new JsonResponse(['errors' => [
                [
                    'status' => '404',
                    'title' => 'Resource not found',
                    'message' => 'The requested todo could not be found.',
                ]
            ]
            ], 404);
        }
        return new TodoResource($todo);
    }

    public function delete($id)
    {
        $todo = $this->todoRepository->findById($id);
        if(!$todo){
            return new JsonResponse(['errors' => [
                [
                    'status' => '404',
                    'title' => 'Resource not found',
                    'message' => 'The requested todo could not be deleted.',
                ]
            ]
            ], 404);
        }
        if(!$this->isTodoOwner($id)){
            return new JsonResponse(['errors' => [
                [
                    'status' => '403',
                    'title' => 'Resource not found',
                    'message' => 'The requested todo could not be deleted.',
                ]
            ]
            ], 403);
        }
        $this->todoRepository->delete($id);
        return response()->json(['message' => 'Todo deleted successfully']);
    }

    public function isTodoOwner($id)
    {
        return auth()->id() === $this->todoRepository->findById($id)->user_id;
    }
}
