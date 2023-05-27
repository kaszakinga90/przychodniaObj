<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $attributes = [
        //'VisitId',
        'DoctorId',
        'PatientId',
        'VisitDate',
        'VisitTime',
    ];

    // Tabela w BD
    protected $table = 'visit';
    public $timestamps = false;
    //protected $primaryKey = 'VisitId';

    //Metoda zwracająca obiekt Doctor przy wyświetlaniu wizyt
    public function doctor() {
		return $this->belongsTo(Doctor::class, 'DoctorId');
	}
	//Metoda zwraca wszystkich lekarzy
	public function doctors() {
		return Doctor::all();
	}
}
