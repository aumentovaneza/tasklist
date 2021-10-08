<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getTasks()
    {
        return response([
            'data' => TaskResource::collection(Auth::user()->tasks),
            'message' => 'Successfully retrieved user tasks'
        ], 200);
    }
}
