<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mascota extends Model
{
    protected $table = 'mascotas';

    protected $fillable = [
        'cliente_id',
        'nombre',
        'especie',
        'raza',
        'edad',
    ];

    // Relación con el cliente (usuario)
    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }
}
