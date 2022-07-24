<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $params)
    {
        $query->when($params['q'] ?? null, function ($query, $q) {
            $query->where('nombre', 'LIKE', "%{$q}%");
        });
    }
}
