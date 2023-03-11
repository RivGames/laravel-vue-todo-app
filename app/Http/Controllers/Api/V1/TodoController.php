<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreTodoRequest;
use App\Http\Requests\Todo\UpdateTodoRequest;
use App\Http\Resources\Todo\TodoResource;
use App\Models\Todo;
use App\Services\TodoService;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(TodoService $todoService)
    {
        return response()->json($todoService->index());
    }

    public function store(StoreTodoRequest $request,TodoService $todoService)
    {
        if(!$todoService->create($request->getDto())){
            return response()->json("Something went wrong...");
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Task successfully created!',
        ]);
    }

    public function show(Todo $todo)
    {
        return new TodoResource($todo);
    }

    public function update(UpdateTodoRequest $request,Todo $todo,TodoService $todoService)
    {
        if(!$todoService->update($request->getDto(),$todo)){
            return response()->json(['message' => 'Whoops...']);
        }
        return response()->json(['status' => 'success', 'message' => 'Task successfully updated!']);
    }
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(['status' => 'success','message' => 'Task successfully deleted']);
    }
}
