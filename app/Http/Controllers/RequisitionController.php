<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requisition;
use App\Models\Stock;

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
    }
    public function getRequisition()
    {
        // code...
        $requisition = Requisition::with('stock','medecine','user')
        ->get();
        return $requisition;
    }
}
