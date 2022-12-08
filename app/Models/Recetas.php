<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion'];

    public function recetaingredientes(){
        return $this->belongsToMany(Ingredientes::class);
    }

}
