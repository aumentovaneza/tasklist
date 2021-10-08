<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function getTaskByID($id)
    {
        $task = Task::find($id);

        return response([
            'data' => new TaskResource($task),
            'message' => 'Successfully retrieved user tasks'
        ], 200);
    }

    public function manageTask(TaskRequest $request)
    {
        DB::transaction();

        try{
            $task = Task::updateOrCreate([
                'id'    => $request->id
            ],[
                'name'              => $request->name,
                'description'       => $request->description,
                'user_id'           => Auth::user()->id,
                'status_id'         => $request->status_id,
                'parent_task_id'    => $request->parent_task_id ?? null,
                'is_child'          => isset($request->parent_task_id) ? true : false,
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
            ]);

            $message = null;
            if(isset($request->id)){
                $message = "Successfully updated the task!";
            } else {
                $message = "Succesfully created the task!";
            }

            DB::commit();
            return response(['data' => new TaskResource($task), 'message' => $message], 200);
        } catch(\Exception $e){
            DB::rollBack();

            return response(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function delete($id)
    {
        $task = Task::find($id);
        DB::transaction();
        try {

            if (empty($task->subtasks)) {
                $task->delete();
            } else {
                $subtasks = $task->subtasks;

                foreach ($subtasks as $subtask) {
                    $subtask->delete();
                }
            }

            return response(['message' => 'Successfully deleted task'], 200);

        } catch (\Exception $e) {
            return response(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function restoreTask($id)
    {
        $task = Task::withTrashed()->find($id)->restore();

        if(!empty($task->subtasks)){
            foreach($task->subtasks as $subtask){
                Task::withTrashed()->find($subtask->id)->restore();
            }
        }

        return response(['message' => 'Successfully restored task/s'], 200);

    }
}
