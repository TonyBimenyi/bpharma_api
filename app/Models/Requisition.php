<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
        'id_stock',
        'id_user',
        'validate_by',
        'created_at',
        'updated_at'
    ];

    public function getUser(){
        return $this->belongsTo('App\Models\User', 'id');
    }

}

