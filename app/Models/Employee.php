<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'f_name',
        'l_name',
        'email',
        'phone',
        'status'
    ];

    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }
}
