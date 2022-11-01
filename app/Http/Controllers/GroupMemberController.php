<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupMemberResource;
use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'data' => GroupMemberResource::collection(GroupMember::all()),
            'message' => 'Successfully retrieved all groups'
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
            $member = GroupMember::create([
                'name' => $request->name
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['success' => false, 'message' => $e->getMessage()], 422);
        }

        DB::commit();
        return response(['data' => GroupMemberResource::collection(GroupMember::all()), 'message' => 'Successfully created a new group!'], 200);
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
    public function update(Request $request, GroupMember $member)
    {
        DB::beginTransaction();
        try {
            $group = Group::where('name', 'ilike', '%' . $request->group . '%')->first();
            $member->group()->associate($group);
            $member->save();
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['success' => false, 'message' => $e->getMessage()], 422);
        }

        DB::commit();
        return response(['data' => GroupMemberResource::collection(GroupMember::all()), 'message' => 'Successfully updated group!'], 200);

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
