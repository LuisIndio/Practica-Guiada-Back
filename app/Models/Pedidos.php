<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','direccion','cliente_id'];

    public function cliente(){
        return $this->belongsTo(Clientes::class);
    }
    public function pedidosproductos(){
        return $this->belongsToMany(Productos::class,'pedidos_productos','pedido_id','producto_id');
    }

}
