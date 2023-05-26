<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $attributes = [
        'DoctorId',
        'FirstName',
        'LastName',
        'CodeDr',
        'Specialization',
    ];

    // Tabela w BD
    protected $table = 'doctor';
    public $timestamps = false;
    protected $primaryKey = 'DoctorId';
}
