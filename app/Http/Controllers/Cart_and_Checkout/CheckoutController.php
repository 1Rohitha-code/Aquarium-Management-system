<?php

namespace App\Http\Controllers\Cart_and_Checkout;

use App\Models\Order;
use App\Models\Product;
use App\Models\Order_item;
use Illuminate\Http\Request;
use App\Models\Delivery_Info;
use App\Models\Distance_vs_Cost;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\Online_purchase_settings;



class CheckoutController extends Controller
{
 
    public function display_checkout_page()
            {

            $cost_details = Distance_vs_Cost::all();
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true); 
    
    return view('normal-user-pages.checkout.checkout_page',compact(['cart_data','cost_details']));

             }
    

    //store order method 
    public function storeorder(Request $request)
        {
        $place_order = new Delivery_Info();
        $place_order->first_name = $request->input('first_name');
        $place_order->last_name = $request->input('last_name');
        $place_order->phone_no = $request->input('phone_no');
        $place_order->alternate_no = $request->input('alternate_no');
        $place_order->address_line1 = $request->input('address_line1');
        $place_order->address_line2 = $request->input('address_line2');
        $place_order->location = $request->input('location');
        $place_order->email = $request->input('email');
        $place_order->order_status = $request->input('order_status');

        $place_order->delivery_cost = $request->input('delivery_cost');
        $var = $request->input('delivery_cost');
        $place_order->city =  DB::table('distance_vs__costs')->where('cost', $var)->value('city');
        $place_order->user_id = Auth::user()->id;

        //getting total price and save into the Deliver_info table
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $items_in_cart = $cart_data;

        $total = "0";
        foreach ($items_in_cart as $itemdata) {
            $products = Product::find($itemdata['product_id']);    
            $price_value = $products->unit_price;
            $total = $total + ($itemdata["num_of_items"] * $price_value);
            $final_total = $total + $var;
//--------------this code is used to decrease the product quantity from inventory when customer places the order.-----------------------------
            $product_qty = $products->quantity;
            $total_qty = $product_qty - ($itemdata["num_of_items"]);
            $products->quantity = $total_qty;
            $products->save();
//--------------this code is used to decrease the product quantity from inventory when customer places the order.-----------------------------
            }

        $place_order->total_price = $final_total;
        //$place_order->total_price = $request->input('total_price');
        $place_order->save();
        //getting total price and save into the Deliver_info table
        $getting_order_id = $place_order->id;      
        //Store Order items
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $items_in_cart = $cart_data;
        foreach ($items_in_cart as $itemdata) 
            {
            $items =Order_item::create([
            'order_id' =>  $itemdata['order_id'] = $getting_order_id,
            'product_id' => $itemdata['product_id'],
            'product_name' => $itemdata['product_name'],
            'unit_price' => $itemdata['unit_price'],
            'num_of_items' => $itemdata['num_of_items'], 
                                    ]);      
            }
       $items->save();    
       Cookie::queue(Cookie::forget('shopping_cart'));
       $request->session()->flash('statuscode', 'success');
       return redirect('/checkout')->with('status','You have placed the Order Successfully!');       
            }


    }
