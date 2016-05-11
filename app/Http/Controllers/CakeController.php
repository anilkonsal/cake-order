<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Http\Requests;
use App\Order;

class CakeController extends Controller {

    /**
     * Function to show the order form
     * @param Request $request
     */
    public function create(Request $request) {
        return view('cake.create', []);
    }

    /**
     * Function to store the order in the table
     * @param Request $request
     * 
     */
    public function store(Request $request) {
 
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
        
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->type_of_cake = implode(', ', $request->type_of_cake);
        $order->celebration_type = $celebration_type;
        $order->dream_cake = $request->dream_cake;
        $order->save();
        
        return view('cake.thanks');
        
    }
    /**
     * Function to List the orders in table
     * 
     */
    public function index() {
        $orders = Order::where('status','=',0)->orderBy('id', 'desc')->get();
        
        return view('cake.index',['orders' => $orders]);
    }
    
    /**
     * Function to change status of the order
     * @param int $order_id
     * @return int
     */
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
