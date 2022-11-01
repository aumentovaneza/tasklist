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

    public function registerPage()
    {
        return view('register');
    }

    public function dashboardPage()
    {
        // Need to filter out to only get the tasks for today
        $tasks = Task::where('user_id', Auth::user()->id)
                    ->where('parent_task_id','=',null)
                    ->where('deleted_at',null)
                    ->orderBy('order', 'asc')
                    ->get();

        return view('dashboard')->with(['tasks' => TaskResource::collection($tasks)]);
    }
}
