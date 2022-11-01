<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
