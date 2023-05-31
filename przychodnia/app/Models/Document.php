<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    //protected $attributes = [
    protected $fillable = [
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

}
