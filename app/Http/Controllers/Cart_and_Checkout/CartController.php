<?php

namespace App\Http\Controllers\Cart_and_Checkout;


use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Distance_vs_Cost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    
    public function addtocart(Request $request){
        
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');
   
        //first of all checks whether there is a cookie and if it is there,
        //then pass this cookie as an array by decoding into a variable called cart_data
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            //if it is nothing inside the shopping cart variable, it will pass an empty array.
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'product_id');
        $prod_id_is_there = $prod_id;

        //we use in array method to check whether the product is there or not in list.
           
            //--------------------Example---------------------------------------
            // $people = array("Peter", "Joe", "Glenn", "Cleveland", 23);

            // if (in_array("23", $people, TRUE))
            //   {
            //   echo "Match found<br>";
            //   }
            //-----------------------------------------------------------

                            //search an array for an specific value
                        if(in_array($prod_id_is_there, $item_id_list)){

                                //if the product is already there, then it will run the below foreach loop.
                                foreach($cart_data as $keys => $values)
                                {
                                    if($cart_data[$keys]["product_id"] == $prod_id)
                                    {
                                            //if product is already there, then update quantity and store into cookie
                                        $cart_data[$keys]["num_of_items"] = $request->input('quantity');
                                        $item_data = json_encode($cart_data);
                                        $minutes = 60;
                                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                                        return response()->json(['status'=>'"'.$cart_data[$keys]["product_name"].'" Already Added to Cart']);

                                    }
                                }
                            } //if the product is not in the cart, then please add it into the shopping cart.
                            else
                            {
                                //adding new product under new product id
                                //take the product details by using its product id and store into a Cookie

                                    $products = Product::find($prod_id);
                                    $prod_name = $products->product_name;
                                    $prod_image = $products->image;
                                    $priceval = $products->unit_price;
                               

                                    if ($products) {
                                        $item_array = array(
                                            'product_id' => $prod_id,
                                            'product_name' => $prod_name,
                                            'num_of_items' => $quantity,
                                            'unit_price' => $priceval,
                                            'image' => $prod_image
                                        );
                                        //we created as an array format.
                                        $cart_data[] = $item_array;

                                        $item_data = json_encode($cart_data);
                                        $minutes = 60;
                                        //we create a cookie called shopping cart and store into it
                                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                                        return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
                                    }

        

                            }
       
    }



    //display data in cart
    public function display_items_in_cart(Request $request){
        

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
       // return $cart_data;
        $get_prod_qty = Product::all();
       return view('normal-user-pages.shopping_cart.display_cart_data',compact(['get_prod_qty','cart_data']));
    //    ->with('display_cart_data',$cart_data);
  
    }

    
     //this will display the count of items in front of cart icon
    public function cartloadbyajax()
    {
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
        else
        {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
    }
     //this will display the count of items in front of cart icon


     //update to cart
     public function updatetocart(Request $request){
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');
         if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'product_id');
            $prod_id_is_there = $prod_id;
            
                    if(in_array($prod_id_is_there, $item_id_list))
                    {
            
                        //if the product is already there, then it will run the below foreach loop.
                        foreach($cart_data as $keys => $values)
                        {
                            if($cart_data[$keys]["product_id"] == $prod_id)
                            {
                                $cart_data[$keys]["num_of_items"] = $quantity ;

                                $ttprice = ($cart_data[$keys]["unit_price"] * $quantity);
                                $grandtotalprice = number_format($ttprice);

                                $item_data = json_encode($cart_data);
                                $minutes = 60;
                                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                                return response()->json(['status'=>'"'.$cart_data[$keys]["product_name"].'" Quantity Updated',
                                'gtprice' => ''.$grandtotalprice.''
                                ]);
                                    }
                            }

                        }
                    }

         }
            //update to cart

         //delete from cart
         public function deletefromcart(Request $request)
         {
             $prod_id = $request->input('product_id');
     
             $cookie_data = stripslashes(Cookie::get('shopping_cart'));
             $cart_data = json_decode($cookie_data, true);
     
             $item_id_list = array_column($cart_data, 'product_id');
             $prod_id_is_there = $prod_id;
     
             if(in_array($prod_id_is_there, $item_id_list))
             {
                 foreach($cart_data as $keys => $values)
                 {
                     if($cart_data[$keys]["product_id"] == $prod_id)
                     {
                         unset($cart_data[$keys]);
                         $item_data = json_encode($cart_data);
                         $minutes = 60;
                         Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                         return response()->json(['status'=>'Item Removed from Cart']);
                     }
                 }
             }
         }
         //delete from cart

     //clear cart
         public function clearcart()
    {
        Cookie::queue(Cookie::forget('shopping_cart'));
        return response()->json(['status'=>'Your Cart is Cleared']);
    }
    //clear cart


     } //main close bracket
  

   

