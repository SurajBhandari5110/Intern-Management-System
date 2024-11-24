<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedCourse extends Model
{
    use HasFactory;

    protected $fillable = ['intern_id', 'table_name', 'assigned_at'];
}
