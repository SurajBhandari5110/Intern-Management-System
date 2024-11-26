<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HrForm1 extends Model
{
    use HasFactory;

    protected $table = 'hr_form1';
    protected $fillable = [
        'inter_id', 'hr_id', 'marksheet_12th', 'marksheet_10th', 'adhar_card', 
        'photo', 'degree', 'sign_offerletter'
    ];
}
