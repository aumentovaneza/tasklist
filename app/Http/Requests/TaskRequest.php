<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'id'                => 'integer|null',
            'name'              => 'string|required',
            'description'       => 'null',
            'status_id'         => 'integer|required',
            'is_child'          => 'boolean',
            'parent_task_id'    => 'integer|required_if:is_child,==,true',
            'start_date'        => 'datetime',
            'end_date'          => 'datetime|null',
        ];
    }
}
