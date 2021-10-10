<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\BasicTaskStatusResource;
use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskStatusController extends Controller
{
    public function getAllStatusesByUser()
    {
        $statuses = TaskStatus::where('is_default_status', true)->orwhere('user_id', Auth::user()->id)->get();

        return response([
            'data' =>  BasicTaskStatusResource::collection($statuses),
            'message' => 'Successfully retrieved user tasks'
        ], 200);
    }

    public function create(TaskRequest $request)
    {
        DB::transaction();

        try{
            $status = TaskStatus::create([
                'name'              => $request->name,
                'is_default_status' => false,
                'user_id'           => Auth::user()->id
            ]);

            DB::commit();
            return response(['data' => new BasicTaskStatusResource($status), 'message' => 'Successfully created a new status!'], 200);

        } catch(\Exception $e) {
            DB::rollBack();
            return response(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }
}
