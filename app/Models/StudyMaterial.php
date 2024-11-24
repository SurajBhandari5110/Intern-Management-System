<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyMaterial extends Model
{
    use HasFactory;

    protected $table = 'studymaterial'; // The table name in the database
    protected $fillable = ['table_name']; // Add other columns if needed
}

