<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecine;

use DB;

class PurchaseController extends Controller
{
    public function addStock(Request $request,$id=8)
    {
        $med = Medecine::where('id_medecine','=',$id)->first();
        $med->qty_stock = $med->qty_stock+9;
        $med->update();
    }
}
