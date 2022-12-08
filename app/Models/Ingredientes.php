<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredientes extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','calidad','stock_id'];

    public function stock_ingredientes(){
        return $this->belongsTo(StockIngredientes::class);
    }
    public function recetaingredientes(){
        return $this->belongsToMany(Recetas::class);
    }

}
