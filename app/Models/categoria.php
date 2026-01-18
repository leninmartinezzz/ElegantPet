<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'visualizacion',
        'estado'
    ];

// ✅ RELACIÓN CON ARTÍCULOS
    public function articulos()
    {
        return $this->hasMany(articulos::class, 'categoria_id');
    }
}
