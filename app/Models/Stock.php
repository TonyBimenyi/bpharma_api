<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medecine;
use App\Models\User;

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
    // public function medecine(){
    //     return $this->belongsTo(Medecine::class);
    // }
    public function medecine()
    {
        return $this->hasMany(related:Medecine::class, foreignKey:'id_medecine');
    }
    public function user()
    {
        return $this->hasMany(related:User::class, foreignKey:'id');
    }

}
