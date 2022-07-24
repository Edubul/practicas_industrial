<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestasRespuestas extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_control',
        'pregunta_id',
        'respuesta',
        'pregunta_id1',
        'respuesta1',
        'pregunta_id2',
        'respuesta2',
        'pregunta_id3',
        'respuesta3',
        'pregunta_id4',
        'respuesta4',
        'pregunta_id5',
        'respuesta5',
        'pregunta_id6',
        'respuesta6',
        'pregunta_id7',
        'respuesta7',
        'pregunta_id8',
        'respuesta8',
        'pregunta_id9',
        'respuesta9',
    ];
}
