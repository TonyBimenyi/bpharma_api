<?php

namespace App\Models;

use App\Models\Requisition;
use App\Models\Stock;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecine extends Model
{
    use HasFactory;
    protected $table = 'medecines';
    protected $primaryKey = 'id_medecine';
    protected $fillable = [
        'id_medecine',
        'name_medecine',
        'price_medecine',
        'cat_medecine',
        'type_medecine',
        'indication_medecine',
        'etat',
        'qty_stock',
        'qty_etagere',
        'id_user',
    ];
     public function stock(){
        return $this->belongsTo(related:Stock::class,foreignKey:'id_medecine');
    }
     public function order_items(){
        return $this->belongsTo(related:OrderItem::class,foreignKey:'id_medecine');
    }
     public function orders(){
        return $this->belongsTo(related:Order::class,foreignKey:'id_medecine');
    }

    public function requisitions(){
        return $this->hasMany(Requisition::class, foreignKey:'id_medecine');
    }
}
