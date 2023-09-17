<?php

namespace App\Models;
use App\Models\Medecine;
use App\Models\Requisition;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perte extends Model
{
    use HasFactory;
    protected $table = 'pertes';
    protected $primaryKey = 'id_perte';
    protected $fillable = [
        'id_requi',
        'id_stock',
        'id_user',
        'id_medecine',
        'qty',
        'description',
    ];
    public function user()
    {
        return $this->hasMany(User::class,'id','id_user');
    }
    public function medecine()
    {
        return $this->hasMany(Medecine::class,'id_medecine','id_medecine');
    }
     public function requisition()
    {
        return $this->hasMany(Requisition::class,'id_requi','id_requi');
    }
}
