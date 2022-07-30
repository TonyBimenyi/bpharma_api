<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecine;
use App\Models\Stock;

use DB;

class StockController extends Controller
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
    public function addToStock(Request $request)
    {
        # code...
        $request->validate([
            'qty_stock'=>'required',
            'total_price'=>'required',
            'exp_date'=>'required'
        ]);
        $unit_price = $request->get('total_price')/$request->get('qty_stock');
        $stock = new Stock([
            'initial_qty'=>$request->get('qty_stock'),
            'actual_qty'=>$request->get('qty_stock'),
            'exp_date'=>$request->get('exp_date'),
            'unit_price'=>$unit_price,
            'total_price'=>$request->get('total_price'),
            'unite'=>$request->get('unite'),
            'id_medecine'=>$request->get('id_medecine'),
            'id_user'=>$request->get('id_user')
        ]);
        $stock->save();


    }
    public function getStock()
    {
        # code...
        // $stock = Stock::select(DB::raw('stocks.*,users.*,medecines.*'))
        // ->join('users','stocks.id_user','=','users.id')
        // ->join('medecines','stocks.id_medecine','=','medecines.id_medecine')
        // ->take(30)
        // ->orderBy('name_medecine')
        // ->get();
        // return $stock;
        // $medecine = Medecine::with('stock')->get();
        $stock = Stock::with('medecine','user')->get();
        $user = Stock::with('user')->get();
        // return $medecine;
        return $stock;
        // return $user
        // return $medecine;
    }
}
