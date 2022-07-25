<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecine;

use DB;

class PurchaseController extends Controller
{
    public function addStock(Request $request,$id)
    {
        $med = new Medecine([
           $d=$request->get('qty_purchase'),

        ]);

        $med = Medecine::where('id_medecine','=',$id)->first();
        $med->qty_stock = $med->qty_stock + $d;
        $med->update();
    }
    public function addToPurchase(Request $request)
    {
        # code...
    }
}
