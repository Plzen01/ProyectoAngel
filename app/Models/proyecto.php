<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
    /** @use HasFactory<\Database\Factories\ProyectoFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estudiante_id',
        'profesor_id',
        'estado',
    ];

    public function usuario(){

        return $this->belongsTo(User::class);
    }

    public function archivos(){

        return $this->hasMany(archivo::class);
    }

    public function comentarios(){

        return $this->hasMany(comentario::class);
    }
}
