<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class articulos extends Model
{
    protected $table = 'articulos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'categoria_id',
        'imagen',
        'activo',
        'existencia',
    ];

    public function categoria()
    {
        return $this->belongsTo(categoria::class, 'categoria_id');
    }
}
