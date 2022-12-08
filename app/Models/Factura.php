<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = ['fecha','precio_total','pedido_id'];

    public function pedido(){
        return $this->belongsTo(Pedidos::class);
    }

}
