<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecine;
use DB;

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
            'id_user'=>$request->get('id_user')
        ]);
        $medecine->save();
    }
    public function getMedecine()
    {
        $medecines = Medecine::select(DB::raw('medecines.*,users.*'))
        ->join('users','medecines.id_user','=','users.id')
        ->take(30)
        ->orderBy('name_medecine')
        ->get();
        return ($medecines);
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
