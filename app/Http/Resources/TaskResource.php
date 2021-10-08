<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'description'       => $this->description,
            'order'             => $this->order,
            'status'            => new BasicStatus($this->status),
            'user'              => new BasicUserResource($this->user),
            'subtasks'          => empty($this->subtasks) ? null : BasicTaskResource::collection($this->subtasks),
            'parent_task_id'    => empty($this->parent_task_id) ? null : $this->parent_task_id
        ];
    }
}
