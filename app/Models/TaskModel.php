<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;
    protected $table = 'task_models';
    protected $fillable = ['project_id', 'value', 'status'];

    public function project()
    {
        return $this->belongsTo(ProjectModel::class);
    }
}
