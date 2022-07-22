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
            'id_user'=>$request->get('id_user')
        ]);
        $medecine->save();
    }
    public function getMedecine()
    {
        $medecines = Medecine::select(DB::raw('medecines.*,users.*'))
        ->join('users','medecines.id_user','=','users.id')
        ->get();
        return ($medecines);
    }
}
