<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    protected $fillable = ['project_id', 'title', 'completed'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
