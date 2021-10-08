<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';
    protected $fillable = [
        'user_id', 'status_id', 'name', 'description', 'is_child', 'parent_task_id','start_date','end_date', 'order'
    ];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->hasOne(TaskStatus::class);
    }

    public function subtasks()
    {
        return $this->hasMany(Task::class,'parent_task_id','id');
    }

    public function parent_task()
    {
        return $this->belongsTo(Task::class,'parent_task_id');
    }
}
