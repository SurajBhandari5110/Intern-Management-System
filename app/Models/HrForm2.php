<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HrForm2 extends Model
{
    use HasFactory;

    protected $table = 'hr_form2';
    protected $fillable = [
        'inter_id', 'hr_id', 'bankDetails', 'collegeName', 
        'phone_Placementcell', 'NOC', 'Refer_a_friend'
    ];
}
