<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternTopicStatus extends Model
{
    use HasFactory;

    protected $fillable = ['intern_id', 'table_name', 'topic_id', 'status', 'remarks'];
}
