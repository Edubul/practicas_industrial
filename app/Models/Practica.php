<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'clave_practica',
        "profesores",
        "materia",
        "unidad",
        "tema",
        "nombre_practica",
        "atributo_egreso",
        "req_ub_op1",
        "req_ub_op2",
        "equipo_prot",
        "maq_usar",
        "inst_med",
        "material_didactico",
        "herr_man",
        "recom_seguridad",
        "objetivo",
        "pasos",
        "fuentes_info",
        "status",
        'material_apoyo'
    ];

    public function scopeFilter($query, array $params)
    {
        switch (($params['opcion'] ?? null)) {
            case 'nombre_archivo':
                $query->when($params['q'] ?? null, function ($query, $q) {
                    $query->where('clave_practica', 'LIKE', "%{$q}%");
                });
                break;

            case 'materia':
                $query->when($params['q'] ?? null, function ($query, $q) {
                    $query->where('materia', 'LIKE', "%{$q}%");
                });
        }
    }
}
