@extends('root.master_page')

@section('seemorepagestyles')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
@endsection


@section('navbar')
@include('normal-user-pages.navbar')
@endsection


@section('content')

<section style="background-color:lightgreen">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-1 py-1">
            <div class="text-center">
                <span style="font-size:35px">
                <a href="/" class="text-dark">
                Shopping Cart
                </a> 
                </span>
            </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
         <div class="row">
            <div class="card" style="width: 65rem; height:75rem; background-color:rgba(red, green, blue, alpha)">
                <div class="card-body">
        
            <!--alert-->
            {{-- @if (session('status'))
            <div class="text-center">
              <div class="alert alert-success" role="alert">
                    {{ session('status') }}
              </div>
            </div>
            @endif --}}
            <!--alert-->

     
                <div class="col-md-12">
                        @if(isset($cart_data))
                            @if(Cookie::get('shopping_cart'))
                                @php $total="0" @endphp
                                <div class="shopping-cart">
                                    <div class="shopping-cart-table">
                                        <div class="table-responsive">
                                            <div class="col-md-12 text-right mb-3">
                                            <div class="row">
                                                    <div class="col text-left">   
                                                     <a href="/normal_user" class="font-weight-bold btn btn-primary" style="color:white"><< Continue to shopping</a> 
                                                    </div>
                                                    <div class="col">   
                                                    <a href="javascript:void(0)" class="clear_cart font-weight-bold btn btn-warning" style="color:white;color:black;">Clear Cart</a>
                                                    </div>
                                             <br><br>

                                                  
                                            <table class="table table-bordered my-auto  text-center table-hover"  style="color:black;font-size:14px">
                                                <thead>
                                                    <tr>
                                                        <th class="cart-description" style="width:130px">Image</th>
                                                        <th style="width:180px">Product Name</th>
                                                        <th class="cart-price" style="width:70px">Price (LKR)</th>
                                                        <th class="cart-qty" style="width:130px">Quantity</th>
                                                        <th style="width:60px">Total (LKR)</th>
                                                        <th style="width:40px">Update</th>
                                                        <th style="width:40px">Remove</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody class="my-auto">
                                                @foreach($cart_data as $data) 
                                                    <tr class="cartpage">
                                                        <td class="cart-image">
                                                            <a class="entry-thumbnail" href="javascript:void(0)">
                                                                <img src="{{ asset('uploads/product_imgs/'.$data['image']) }}" width="90px" height="75px" alt="">
                                                            </a>
                                                        </td>
                                                        <td class="cart-product-name-info">
                                                            <h4 class="cart-product-description">
                                                            <!---------------This code used to get the product quantity---------------------->
                                                                    @foreach($get_prod_qty as $prod_qty)
                                                                        @if($data['product_id'] == $prod_qty->id)
                                                                            <?php $prod_qty->quantity;?>
                                                                    <!---------------this code is converted php var to js var----------------------->        
                                                                    <input type="hidden" class="db_qty" value="{{$prod_qty->quantity}}" >
                                                                        @else 
                                                                            @continue
                                                                        @endif
                                                                    @endforeach
                                                            <!---------------This code used to get the product quantity---------------------->  
                                                         
                                                                <a href="javascript:void(0)"><span style="font-size:16px;">{{ $data['product_name'] }}</span></a>
                                                            </h4>
                                                        </td>
                                                        <td class="cart-product-sub-total">
                                                            <span class="cart-sub-total-price">{{ number_format($data['unit_price'], 2) }}</span>
                                                        </td>
                                                               
                                                        <td class="cart-product-quantity" > 
                                                            <!--getting the product id-->
                                                            <input type="hidden" class="product_id" value="{{ $data['product_id'] }}" >
                                                            <input type="hidden" class="num_of_items" value="{{ $data['num_of_items'] }}" >

                                                            

                                                            <!--getting the product id-->
                                                            <div class="input-group quantity">
                                                                <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                                    <span class="input-group-text"><b>-</b></span>
                                                                </div>
                                                                <input type="number" class="qty-input form-control"  min="1" max="1000"  value="{{ $data['num_of_items'] }}" oninput="validity.valid||(value='');"  style="width:50px">
                                                                
                                                                <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                                    <span class="input-group-text"><b>+</b></span>
                                                                </div>
                                                            </div>
                                                        </td>  

                                                        <td class="cart-product-grand-total"> 
                                                            <span class="cart-grand-total-price">{{ number_format($data['num_of_items'] * $data['unit_price'], 2) }}</span>
                                                        </td>
                                                        <td>  
                                                            <div class="my_update_btn">      
                                                        <button type="button" class="btn btn-primary btn-pill btn-sm"><li class="fa fa-refresh"></li>&nbsp; </button>
                                                            </div>   
                                                        </td>
                                                        <td>
                                                    <button type="button" class="delete_cart_data btn btn-danger btn-pill btn-sm delete_cart_data"><li class="fa fa-trash-o"></li>&nbsp;</button>         
                                                           
                                                        </td>
                                                        @php $total = $total + ($data["num_of_items"] * $data["unit_price"]) @endphp
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>            
                                        </div>
                                    </div>
                                    <div class="row">
           
                                        <div class="col-md-8 col-sm-12 estimate-ship-tax">
                                            <!-- <div><br>
                                                <a href="{{ url('collections') }}" class="btn btn-upper btn-warning outer-left-xs">Continue Shopping</a>
                                            </div> -->
                                        </div>

                                        <div id="totalajaxcall" class="col-md-4 col-sm-12" style="background-color:khaki">
                                        <hr>
                                            <div class="totalpricingload">   

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6 class="cart-subtotal-name" style="font-size:15px"><strong>Subtotal</strong></h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="cart-subtotal-price" style="font-size:15px">
                                                        <strong> LKR.</strong>

                                                            <span class="cart-grand-price-viewajax"><strong>{{ number_format($total, 2) }}</strong></span>
                                                        </h6>
                                                    </div>
                                                </div>                           
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6 class="cart-grand-name" style="font-size:15px"><strong>Grand Total</strong></h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="cart-grand-price" style="font-size:15px">
                                                        <strong> LKR.</strong>
                                                            <span class="cart-grand-price-viewajax grandtotal"><strong>{{ number_format($total, 2) }}</strong></span>
                                                        </h6>
                                                    </div>

                                                </div>
                                                <hr>
                                                <div class="row"> 
                                                    <div class="col-md-12">
                                                        <div class="cart-checkout-btn text-center">
                                                        
                                                        <a href="/checkout" class="btn btn-primary btn-block">
                                                        Proceed to checkout
                                                                </a>
                                                            
                                                            <h6 class="mt-3"></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                </div> 
                            @endif
                        @else
                            <div class="row">
                                <div class="col-md-12 mycard py-5 text-center">
                                    <div class="mycards">
                                        <h2>Your cart is currently empty.</h2>
                                        <a href="{{ url('collections') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                   

            </div> <!--card div end-->
</div> <!--card body end-->


        </div>  

    </div>
</section>

@endsection

@section('seemorescripts')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/custom.js') }}"></script>
@endsection

