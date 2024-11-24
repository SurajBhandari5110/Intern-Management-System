<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOD extends Model
{
    use HasFactory;

    protected $fillable = ['intern_id', 'today', 'tomorrow', 'issue'];

    // Relationship with Intern (User model)
    public function intern()
    {
        return $this->belongsTo(User::class, 'intern_id');
    }
}
