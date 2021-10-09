<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getTasks()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->where('parent_task_id','=',null)->where('deleted_at',null)->get();

        return response([
            'data' => TaskResource::collection($tasks),
            'message' => 'Successfully retrieved user tasks'
        ], 200);
    }
}
