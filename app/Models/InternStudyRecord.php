<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternStudyRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'intern_id',
        'material_table',
        'status',
        'comment',
    ];

    public function intern()
    {
        return $this->belongsTo(User::class, 'intern_id');
    }
}
