<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Task as TaskResource;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::all();
        return $this->handleResponse(TaskResource::collection($tasks), 'Tasks have been retrieved!');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'details' => 'required'
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
        $task = Task::create($input);
        return $this->handleResponse(new TaskResource($task), 'Task created!');
    }

    public function show($id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return $this->handleError('Task not found!');
        }
        return $this->handleResponse(new TaskResource($task), 'Task retrieved.');
    }

    public function update(Request $request, Task $task)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'details' => 'required'
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }

        $task->name = $input['name'];
        $task->details = $input['details'];
        $task->save();
        
        return $this->handleResponse(new TaskResource($task), 'Task successfully updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return $this->handleResponse([], 'Task deleted!');
    }
}