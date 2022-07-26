<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    protected $primaryKey = 'id_stock';
    protected $fillable = [
        'id_stock',
        'initial_qty',
        'actual_qty',
        'exp_date',
        'unit_price',
        'total_price',
        'id_medecine',
        'unite',
        'id_user',
    ];
}
