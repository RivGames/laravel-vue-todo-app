<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreTodoRequest;
use App\Http\Requests\Todo\UpdateTodoRequest;
use App\Services\TodoService;
use Illuminate\Http\JsonResponse;

class TodoController extends Controller
{
    private TodoService $todoService;
    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
        $this->middleware('auth:api');
    }

    /**
     * @return \App\Http\Resources\Todo\TodoCollection
     */
    public function index(): \App\Http\Resources\Todo\TodoCollection
    {
        return $this->todoService->index();
    }

    /**
     * @param StoreTodoRequest $request
     * @return JsonResponse
     */
    public function store(StoreTodoRequest $request): JsonResponse
    {
        return $this->todoService->create($request->getDto());
    }

    /**
     * @param $id
     * @return \App\Http\Resources\Todo\TodoResource|JsonResponse
     */
    public function show($id): \App\Http\Resources\Todo\TodoResource|JsonResponse
    {
        return $this->todoService->show($id);
    }

    /**
     * @param UpdateTodoRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateTodoRequest $request, $id): JsonResponse
    {
       return $this->todoService->update($request->getDto(),$id);
    }
    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return $this->todoService->delete($id);
    }
}
