<?php

namespace App\Models;
use App\Models\Order;
use App\Models\Medecine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table='order_items';
    protected $fillable = ['order_id','id_medecine','name_medecine','qty','pa','pv','id_requi'];	

     public function orders(){
        return $this->belongsTo(related:Order::class,foreignKey:'order_id');
    }
    public function medecine()
    {
        return $this->hasMany(Medecine::class,'id_medecine','ide_medecine');
    }  
}
