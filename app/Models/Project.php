<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory; // Add this to enable factory support if needed

    protected $fillable = ['name'];

    // Relationship with ProjectTeam
    public function projectTeams()
    {
        return $this->hasMany(ProjectTeam::class, 'project_id');
    }

    // Optional: Add relationship to interns through the project team
    public function interns()
    {
        return $this->hasManyThrough(User::class, ProjectTeam::class, 'project_id', 'id', 'id', 'intern_id');
    }
}
