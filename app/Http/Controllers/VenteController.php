<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VenteController extends Controller
{
    public function venteCart()
    {
        // code...
        $user_info = DB::table('requisitions')
                 ->select('id_medecine', DB::raw('sum(actual_qty_requi) as qty_available '))
                 ->groupBy('id_medecine')
                 ->get();

        return $user_info;
    }
}
