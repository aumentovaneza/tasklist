<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\BasicTaskResource;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Carbon\Carbon;
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
        DB::beginTransaction();

        $lastTaskOrder = Auth::user()->tasks->last()->order;
        $order = $lastTaskOrder + 1;

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
                'start_date'        => $request->start_date != null ? $request->start_date : Carbon::now(),
                'end_date'          => $request->end_date,
                'order'             => $request->order != null ? $request->order : $order
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

        if ($task->subtasks->isEmpty()) {
            $task->delete();
        } else {
            $subtasks = $task->subtasks;
            foreach ($subtasks as $subtask) {
                $subtask->delete();
            }
            $task->delete();
        }

        return response(['message' => 'Successfully deleted task'], 200);
    }

    public function getParentId($id)
    {
        $task = Task::find($id);

        if($task->parent_task_id) {
            return response(['data' => $task->parent_task_id]);
        } else {
            return response(['data' => null]);
        }
    }

    public function getArchivedTasks()
    {
        $tasks = Task::where('user_id', Auth::user()->id)
            ->onlyTrashed()
            ->get();

        return response(['data' => BasicTaskResource::collection($tasks)]);
    }

    public function restoreTask($id)
    {
        $task = Task::onlyTrashed()->where('id',$id)->first()->restore();

        return response(['message' => 'Successfully restored task/s'], 200);

    }

    public function downloadTasks()
    {
        $fileName = 'all_tasks_'. Auth::user()->name .'.json';
        $tasks = Task::where('user_id', Auth::user()->id)->with('status')->get();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('ID','NAME', 'DESCRIPTION', 'PARENT ID', 'STATUS', 'START DATE','END DATE');

        $callback = function() use($columns, $tasks) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['ID'] = $task->id;
                $row['NAME']  = $task->name;
                $row['DESCRIPTION']    = $task->description;
                $row['PARENT ID']    = $task->parent_task_id;
                $row['STATUS']  =  $task->status->name;
                $row['START DATE']  = $task->start_date;
                $row['END DATE']  = $task->end_date;

                fputcsv($file, array($row['ID'], $row['NAME'], $row['DESCRIPTION'], $row['PARENT ID'] , $row['STATUS'],
                    $row['START DATE'],$row['END DATE']));
            }

            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function getStatistics()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->with('status')->get();
        $completed = 0;
        $cancelled = 0;
        $pending = 0;
        $others = 0;

        foreach($tasks as $task){

            if($task->status->name === 'Complete') {
                ++$completed;
            } elseif($task->status->name === 'Cancelled'){
                ++$cancelled;
            } elseif($task->status->name === 'Pending'){
                ++$pending;
            } else {
                ++$others;
            }

        }

        return response(['data' => [
            'completed' => $completed,
            'cancelled' => $cancelled,
            'pending'   => $pending,
            'others'    => $others
        ]
        ]);
    }
}
