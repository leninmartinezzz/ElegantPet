<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = [
        'servicio_id',
        'cliente_id',
        'mascota_id',
        'fecha_hora',
        'nota_mascota'
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
    ];

    // Relación con el cliente
    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    // Relación con la mascota
    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'mascota_id');
    }

    // Relación con el servicio
    public function servicio()
    {
        return $this->belongsTo(Servicios::class, 'servicio_id'); // Servicios en plural
    }
}