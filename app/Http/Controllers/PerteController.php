<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perte;
use App\Models\Requisition;

class PerteController extends Controller
{
    //
    public function addPerte(Request $request,$id)
    {
        // code...
         $request->validate([
            'qty'=>'required',
            'description'=>'required'
        ]);
        $perte = new Perte([
            'id_requi'=>$request->get('id_requi'),
            'id_stock'=>$request->get('id_stock'),
            'id_user'=>$request->get('id_user'),
            'id_medecine'=>$request->get('id_medecine'),
            'description'=>$request->get('description'),
            'qty'=>$request->get('qty'),
            
        ]);
        $requisition = new Requisition([
            $qty_requi=$request->get('qty'),
         ]);
        $requisition= Requisition::where('id_requi','=',$id)->first();
        $requisition->actual_qty_requi = $requisition->actual_qty_requi - $qty_requi;
        $requisition->update();
        $perte->save();
    }
    public function getPerte()
    {
        // code...
         $perte = Perte::with('medecine','requisition','user')
        ->get();
        return $perte;

    }
}
