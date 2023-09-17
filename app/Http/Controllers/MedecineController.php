<?php

namespace App\Http\Controllers;

use App\Models\Medecine;
use App\Models\Requisition;
use DB;
use Illuminate\Http\Request;

class MedecineController extends Controller
{
    public function addMedecine(Request $request)
    {
        # code...
        $request->validate([
            'name_medecine'=>'required',
            'price_medecine'=>'required',
        ]);
        $medecine = new Medecine([
            'name_medecine'=>$request->get('name_medecine'),
            'price_medecine'=>$request->get('price_medecine'),
            'cat_medecine'=>$request->get('cat_medecine'),
            'type_medecine'=>$request->get('type_medecine'),
            'indication_medecine'=>$request->get('indication_medecine'),
            'etat'=>1,
            'qty_stock'=>0,
            'qty_etagere'=>0,
            'id_user'=>$request->get('id_user')
        ]);
        $medecine->save();
    }
    public function getMedStock()
    {
        # code...
        $medecines = DB::table('medecines')
       ->join('stocks','medecines.id_medecine','=','stocks.id_medecine')
       ->join('users','medecines.id_user','users.id')
       ->select('medecines.*',DB::raw('SUM(stocks.actual_qty) AS stock_sum'),'users.email')
        ->groupBy('medecines.id_medecine','medecines.name_medecine','medecines.price_medecine','medecines.cat_medecine','medecines.type_medecine','medecines.indication_medecine','medecines.etat','medecines.qty_stock','medecines.qty_etagere','medecines.id_user','medecines.created_at','medecines.updated_at')
       ->orderBy('medecines.name_medecine')

        ->get();
        return $medecines;
    }
    public function getMedecine()
    {
        $medecines = DB::table('medecines')
       ->join('stocks','medecines.id_medecine','=','stocks.id_medecine')
	   ->join('requisitions','stocks.id_stock','=','requisitions.id_stock')	
       ->join('users','medecines.id_user','users.id')
	   ->select('medecines.*',DB::raw('SUM(requisitions.actual_qty_requi) AS requi_sum'),'users.email')
       ->Where('requisitions.validate_by','!=', '0')
        ->groupBy('medecines.id_medecine','medecines.name_medecine','medecines.price_medecine','medecines.cat_medecine','medecines.type_medecine','medecines.indication_medecine','medecines.etat','medecines.qty_stock','medecines.qty_etagere','medecines.id_user','medecines.created_at','medecines.updated_at')
	   ->orderBy('medecines.name_medecine')

        ->get();
        return $medecines;

    }

    public function saveData(Request $request)
    {
        $data = $request->all();
        
        foreach ($data as $value) {
            Commade::create($value);            
        }

        return null;
    }

    public function detailProduit($id){
       $medecines =  Medecine::with('requisitions')
                    ->where('id_medecine', $id)
                    ->get();

        return  $medecines;

    }
    public function updateMedecine(Request $request,$id)
    {
        # code...
        $medecine=DB::table('medecines')
        ->where('id_medecine',$id)
        ->update($request->all());
        return $medecine;
    }
    public function changeEtatOff(Request $request,$id)
    {
        # code...
        $medecine=DB::table('medecines')
        ->where('id_medecine',$id)
        ->update(['etat'=>0]);
    }
    public function changeEtatOn(Request $request,$id)
    {
        # code...
        $medecine=DB::table('medecines')
        ->where('id_medecine',$id)
        ->update(['etat'=>1]);
    }
}
