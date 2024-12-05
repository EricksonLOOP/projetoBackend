<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
    {
        $tasks = $this->taskService->getTasks($request->status);
        return response()->json($tasks);
    }

    public function show($id)
{
    
    $task = $this->taskService->getTaskById($id);

    if (!$task) {
        return response()->json([
            'message' => 'Task not found'
        ], 404); 
    }

    return response()->json($task, 200); 
}


    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',
                'status' => 'required|in:pending,in_progress,completed',
            ]);
    
            $task = $this->taskService->createTask($data);
    
            return response()->json($task, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 400);
        }
    }


    public function update(UpdateTaskRequest $request, $id)
    {
        $task = $this->taskService->getTaskById($id);
    
        if (!$task) {
            return response()->json([
                'message' => 'Task not found'
            ], 404); 
        }
    
        $taskUpdate = $this->taskService->updateTask($id, $request->validated());
        return response()->json($taskUpdate);
    }
    

    public function destroy($id)
    {   
        $task = $this->taskService->getTaskById($id);

        if (!$task) {
            return response()->json([
                'message' => 'Task not found'
            ], 404); 
        }
    
        $this->taskService->deleteTask($id);
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
