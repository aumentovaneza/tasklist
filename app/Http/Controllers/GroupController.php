<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupMemberResource;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'data' => GroupResource::collection(Group::all()),
            'message' => 'Successfully retrieved all groups'
        ], 200);
    }

    public function getMembersById(Group $group)
    {
        return response([
            'data' => GroupMemberResource::collection($group->members),
            'message' => 'Successfully retrieved all members for group'
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::beginTransaction();

        try {
            $group = Group::create([
                'name' => $request->name
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['success' => false, 'message' => $e->getMessage()], 422);
        }

        DB::commit();
        return response(['data' => GroupResource::make($group), 'message' => 'Successfully created a new group!'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
