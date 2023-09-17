<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requisition;
use App\Models\Stock;
use App\Models\Medecine;

class RequisitionController extends Controller
{
    public function addRequisition(Request $request,$id)
    {
        # code...
        $request->validate([
            'initial_qty_requi'=>'required'
        ]);
        $requisition = new Requisition([
            'initial_qty_requi'=>$request->get('initial_qty_requi'),
            'actual_qty_requi'=>$request->get('initial_qty_requi'),
            'purchase_price'=>$request->get('purchase_price'),
            'sale_price_requi'=>$request->get('sale_price'),
            'id_medecine'=>$request->get('id_medecine'),
            'id_stock'=>$request->get('id_stock'),
            'id_user'=>$request->get('id_user'),                
            'validate_by'=>0
        ]);
        $stock = new Stock([
            $stock_qty=$request->get('initial_qty_requi'),
         ]);
        $stock= Stock::where('id_stock','=',$id)->first();
        $stock->actual_qty = $stock->actual_qty - $stock_qty;
        $stock->update();
        $requisition->save();
        $med = new Medecine([
           $validate_qty=$request->get('initial_qty_requi'),
           $id_medecine=$request->get('id_medecine'),
        ]);
        $med = Medecine::where('id_medecine','=',$id_medecine)->first();
        $med->qty_stock = $med->qty_stock - $validate_qty;
        $med->update();
    }
    public function addStock(Request $request,$id)
    {
        # code...
         $stock = new Stock([
            $stock_qty=$request->get('initial_qty_requi'),
         ]);
        $stock= Stock::where('id_stock','=',$id)->first();
        $stock->actual_qty = $stock->actual_qty + $stock_qty;
        $stock->update();
    }
    public function reduceStock(Request $request,$id)
    {
        # code...
         $stock = new Stock([
            $stock_qty=$request->get('initial_qty_requi'),
         ]);
        $stock= Stock::where('id_stock','=',$id)->first();
        $stock->actual_qty = $stock->actual_qty - $stock_qty;
        $stock->update();
    }
    public function getRequisition()
    {
        // code...

        $start_date = \Request::get('start_date');
        $end_date = \Request::get('end_date');


        $requisition = Requisition::with('stock','medecine','user')
        
        ->where(function($query) use($start_date,$end_date){
            if($start_date){
                $query->whereDate('created_at', '>=',$start_date);
            }

            if($end_date){
                $query->whereDate('created_at', '<=',$end_date);
            }

        })
        ->orderBy('id_requi','DESC')
        ->get();
        return $requisition;
    }
     public function expiredRequi()
    {
        // code...
        
        $dateTime = date('Y-m-d H:i:s');
        $requisition = Requisition::with('stock','medecine','user')
        ->join('medecines','requisitions.id_medecine','=','medecines.id_medecine')
        ->join('stocks','requisitions.id_stock','=','stocks.id_stock')
        ->where('stocks.exp_date','<',$dateTime)
        ->orderBy('name_medecine')
        ->get();
        return $requisition;
    }
    public function requisitionVentes()
    {
        // code...


         $requisition = Requisition::with('stock','medecine','user')
        ->join('medecines','requisitions.id_medecine','=','medecines.id_medecine')
        ->where('actual_qty_requi', '>', 0)
        ->where('requisitions.validate_by','!=','0')
        ->orderBy('name_medecine')
        ->get();
        return $requisition;
    }
    public function validateRequi(Request $request,$id)
    {
        // code...
        $requisition = new Requisition([
           $validate_by=$request->get('validate_user'),
        ]);
        $requisition= Requisition::where('id_requi','=',$id)->first();
        $requisition->validate_by = $validate_by;
        $med = new Medecine([
           $validate_qty=$request->get('validate_qty'),
           $id_medecine=$request->get('id_medecine'),
        ]);
        $med = Medecine::where('id_medecine','=',$id_medecine)->first();
        $med->qty_etagere = $med->qty_etagere + $validate_qty;
        $med->update();
        $requisition->update();
    }
    public function deleteRequi(Request $request,$id)
    {
        // code...
         $requisition = Requisition::findOrFail($id);
        $requisition->delete();

        $med = new Stock([
           $id_stock=$request->get('id_stock'),
           $qty=$request->get('qty'),
        ]);
        $med = Stock::where('id_stock','=',$id_stock)->first();
        $med->actual_qty = $med->actual_qty + $qty;
        $med->update();

         $med = new Medecine([
           $id_medecine=$request->get('id_medecine'),
           $qty=$request->get('qty'),
        ]);
        $med = Medecine::where('id_medecine','=',$id_medecine)
        ->first();
        $med->qty_stock = $med->qty_stock + $qty;
        $med->qty_etagere = $med->qty_etagere - $qty;
        $med->update();

    }
}
