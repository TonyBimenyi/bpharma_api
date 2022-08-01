<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Stock;
use App\Models\Medecine;

class Requisition extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_requi';
    protected $fillable = [
        'id_requi',
        'initial_qty_requi',
        'actual_qty_requi',
        'purchase_price',
        'sale_price_requi',
        'id_medecine',
        'id_stock',
        'id_user',
        'validate_by',
        'created_at',
        'updated_at'
    ];

    public function stock(){
        return $this->hasMany(Stock::class,'id_stock','id_stock');
    }
    public function medecine()
    {
        return $this->hasMany(Medecine::class,'id_medecine','id_medecine');
    }   
    public function user()
    {
        return $this->hasMany(User::class,'id','id_user');
    }

}

