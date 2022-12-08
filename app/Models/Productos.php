<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','precio','categoria_id','receta_id'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function receta(){
        return $this->belongsTo(Recetas::class);
    }

    public function pedidosproductos(){
        return $this->belongsToMany(Pedidos::class);
    }
}
