<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecine;
use DB;

class PurchaseController extends Controller
{
    public function addStock(Request $request)
    {
        $med = Medecine::where('id_medecine',4)->first();
        $med->qty_stock = $med->qty_stock+4;
        $med->update();
    }
}
