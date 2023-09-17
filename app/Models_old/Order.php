<?php

namespace App\Models;
use App\Models\User;
use App\Models\Medecine;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    protected $fillable = [
        'id_order',
        'nom_client',
        'numero_client',
        'nif_client',
        'montant_total',
        'montant_paye',
        'id_user',
        'date_commande',
        'created_at',
        'updated_at',
    ];
     public function user()
    {
        return $this->hasMany(User::class,'id','id_user');
    }  
    public function order_details()
    {
        return $this->hasMany(OrderItem::class,'order_id','id_order');
    }  
     public function medecine()
    {
        return $this->hasMany(Medecine::class,'id_medecine','ide_medecine');
    }  
}
