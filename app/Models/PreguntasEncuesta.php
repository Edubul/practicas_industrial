<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntasEncuesta extends Model
{
    use HasFactory;
    protected $table = 'preguntas_encuesta';

    protected $fillable = [
        'pregunta',
    ];
}
