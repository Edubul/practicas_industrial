<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    use HasFactory;
    protected $fillable = [
        'encargado_id',
        'producto_id',
        'profesor_id',
        'hora_pedido',
        'hora_entrega',
        'aula',
        'status',
    ];  

}
