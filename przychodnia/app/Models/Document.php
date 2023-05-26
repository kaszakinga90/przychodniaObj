<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $attributes = [
        'Type',
        'DoctorId',
        'PatientId',
        'IssueDate',
        'Signature',
    ];

    // Tabela w BD
    protected $table = 'document';
    public $timestamps = false;

    //Metoda zwracająca obiekt Doctor przy wyświetlaniu dokumentow
    public function doctor() {
        return $this->belongsTo(Doctor::class, 'DoctorId');
    }
    //Metoda zwraca wszystkich lekarzy
    public function doctors() {
        return Doctor::all();
    }

}
