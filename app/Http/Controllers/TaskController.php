<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\storeTaskRequest;
use App\Http\Requests\updateTaskRequest;


class TaskController extends Controller
{
    public function index()
    {
        return auth()->user()->tasks;
    }

    public function store(Request $request)
    {             
        // $user_id = auth()->user()->id;
        // echo response()->json(['user_id'=>$user_id ]);
        // dd(auth()->check(), auth()->user()->tasks()); // Should return true and user object

        try{

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:pending,in_progress,completed',
            'due_date' => 'nullable|date'
        ]);


        $task = auth()->user()->tasks()->create($data);

        return response()->json($task, 201);
        
         } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        try{
        $this->authorize('update', $task);

        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update($data);

        return response()->json($task);
        }
        catch(ValidationException $e){
            return response()->json([
                'message' => "Validation failed",
                'errors' => $e->errors()
            ], 422);
        }
    }

   

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return response()->json(null, 204);
    }
}