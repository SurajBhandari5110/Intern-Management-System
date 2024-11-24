<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'tl_id', 'intern_id'];

    // Relationship with Project
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    // Relationship with Intern (User model)
    public function intern()
    {
        return $this->belongsTo(User::class, 'intern_id');
    }

    // Relationship with Team Leader (User model)
    public function teamLeader()
    {
        return $this->belongsTo(User::class, 'tl_id');
    }
}
