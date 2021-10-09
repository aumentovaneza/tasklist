<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function dashboardPage()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->where('parent_task_id','=',null)->where('deleted_at',null)->get();

        return view('dashboard')->with(['tasks' => TaskResource::collection($tasks)]);
    }
}
