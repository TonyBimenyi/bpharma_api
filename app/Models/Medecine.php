<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecine extends Model
{
    use HasFactory;
    protected $table = 'medecines';
    protected $fillable = [
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
}
