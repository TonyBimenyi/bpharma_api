<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Requisition;
use App\Models\OrderItem;
use App\Models\Medecine;
use DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function addOrder(Request $request)
    {
    	$order = new Order();
    	$order->nom_client = $request->get('nom_client');
    	$order->numero_client = 11;
    	$order->nif_client = $request->get('nif_client');
    	$order->montant_total = $request->get('montant_total');
    	$order->montant_paye = $request->get('somme_retourner');
    	$order->id_user = $request->get('id_user');
    	$order->save();

    	
    	$last2 = DB::table('orders')->orderBy('id_order', 'DESC')->first();

    	$id = $order->id_order;
    	$carts = $request->get('carts');

    	foreach ($carts as $item) {
    		OrderItem::create([
    			'order_id' => $id,
    			'id_medecine' => $item['id_medecine'],
                'name_medecine' => $item['name_medecine'],
    			'qty' => $item['quantite'],
    			'id_requi' => $item['id_requi'],
    			'pa' => $item['purchase_price'],
    			'pv' => $item['price_medecine'],
    		]);
    		$requi = Requisition::where('id_requi','=',$item['id_requi'])->first();
    		$requi->actual_qty_requi = $requi->actual_qty_requi-$item['quantite'];
    		$requi->update();

    		$med = Medecine::where('id_medecine','=',$item['id_medecine'])->first();
    		$med->qty_etagere = $med->qty_etagere-$item['quantite'];
    		$med->update();
    	}   	
    }
    public function listOrders()
    {
    	$orders = Order::with('user','order_details')->get();
    	
    	return $orders;
    }
    public function detailsById($id)
    {
        // code...
        $orders= OrderItem::
        where('order_id','=',$id)->get();
        return $orders;
    }
    public function stats()
    {
        // code...
        
        $orders = DB::table('order_items')
        ->select('id_medecine',DB::raw('count(*) as "nbre_des_fois",sum(pv) as "prix_vente",sum(pa) as "prix_achat",sum(qty) as "qty",`name_medecine`'))
        ->groupBy('id_medecine','name_medecine')
        ->get();
        return $orders;
    }
    

}
