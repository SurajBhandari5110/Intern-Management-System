<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TlInternAssignment extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'tl_id', 'intern_id',
    ];
    public function intern()
{
    return $this->belongsTo(User::class, 'intern_id');
}

}
