<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    /** @use HasFactory<\Database\Factories\ComentarioFactory> */
    use HasFactory;

    public function usuario(){

        return $this->belongsTo(User::class);
    }

    public function proyecto(){

        return $this->hasMany(Proyecto::class);
    }

}
