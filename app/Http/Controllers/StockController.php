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
    public function addToStock(Request $request,$id)
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
        $d=$request->get('qty_stock');
        // $med = Medecine::where('id_medecine','=',$id)->first();
        // $med->qty_stock = $med->qty_stock + $d;
        // $med->update();
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
        $start_date = \Request::get('start_date');
        $end_date = \Request::get('end_date');

        $stock = Stock::with('medecine','user')
        ->orderBy('id_stock','DESC')
        ->where(function($query) use($start_date,$end_date){
            if($start_date){
                $query->whereDate('created_at', '>=',$start_date);
            }

            if($end_date){
                $query->whereDate('created_at', '<=',$end_date);
            }

        })
        ->get();
        return $stock;
    }
    public function deleteStock(Request $request,$id)
    {
        # code...
         $med = new Medecine([
           $id_medecine=$request->get('id_medecine'),
           $qty=$request->get('qty'),
        ]);
        $med = Medecine::where('id_medecine','=',$id_medecine)
        ->first();
        $med->qty_stock = $med->qty_stock - $qty;
        $med->update();
        $stock = Stock::findOrFail($id);
        $stock->delete();

    }
}
