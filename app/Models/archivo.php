<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class archivo extends Model
{
    /** @use HasFactory<\Database\Factories\ArchivoFactory> */
    use HasFactory;

    public function proyecto(){

        return $this->belongsTo(proyecto::class);
    }


}
