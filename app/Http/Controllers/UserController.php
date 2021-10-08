<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getTasks()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->withNoTrashed();
        return response([
            'data' => TaskResource::collection($tasks),
            'message' => 'Successfully retrieved user tasks'
        ], 200);
    }
}
