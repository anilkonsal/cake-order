<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Http\Requests;
use App\Order;

class CakeController extends Controller {

    public function create(Request $request) {
        return view('cake.create', []);
    }

    public function store(Request $request) {
 
//        dd($_POST);
        
        $this->validate($request, [
            'name'  =>  'required',
            'email' =>  'required',
            'celebration_type'=> 'required'
        ]);

        /*
         * if celebration type is others, then append the content of 
         * Other text box
         */
        $celebration_type = $request->celebration_type;
        if ($celebration_type == 'others') {
            $celebration_type .= ': '.$request->celebration_type_other;
        }
        
//        die($celebration_type);
        
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->type_of_cake = implode(', ', $request->type_of_cake);
        $order->celebration_type = $celebration_type;
        $order->dream_cake = $request->dream_cake;
        $order->save();
        
        return view('cake.thanks');
        
    }
    
    public function index() {
        $orders = Order::where('status','=',0)->orderBy('id', 'desc')->get();
        
        return view('cake.index',['orders' => $orders]);
    }
    
    public function status($order_id) {
        $order = Order::findOrFail($order_id);
        if ($order) {
            $order->status = 1;
            $order->save();
            return 1;
        }
        return 0;
    }

}
