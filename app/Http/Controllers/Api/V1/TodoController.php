<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreTodoRequest;
use App\Http\Requests\Todo\UpdateTodoRequest;
use App\Http\Resources\Todo\TodoCollection;
use App\Http\Resources\Todo\TodoResource;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        return new TodoCollection(Todo::all());
    }

    public function store(StoreTodoRequest $request)
    {
         Todo::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'user_id' => auth()->id(),
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Task successfully created!',
        ]);
    }

    public function show(Todo $todo)
    {
        return new TodoResource($todo);
    }

    public function update(UpdateTodoRequest $request,Todo $todo)
    {
        $todo->update($request->validated());
        return response()->json(['status' => 'success', 'message' => 'Task successfully updated!']);
    }
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(['status' => 'success','message' => 'Task successfully deleted']);
    }
}
