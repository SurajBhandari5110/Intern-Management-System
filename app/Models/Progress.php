<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    // Define the fields that are mass-assignable
    protected $fillable = [
        'intern_id', // Foreign key from Intern
        'progress_details', // Description of the progress
        'status', // Progress status (e.g., 'completed', 'in-progress')
        'date', // Date the progress was updated
    ];

    /**
     * Define the relationship with the Intern model.
     * Each progress record belongs to one intern.
     */
    public function intern()
    {
        return $this->belongsTo(Intern::class); // Each progress is related to an intern
    }
}
