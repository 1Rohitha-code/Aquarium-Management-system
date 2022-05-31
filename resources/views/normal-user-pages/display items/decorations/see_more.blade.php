@extends('root.master_page')

@section('seemorepagestyles')
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>


@endsection


@section('navbar')
@include('normal-user-pages.navbar')
@endsection



@section('content')



<div class="super_container">
    <a href="/decorations_gallary" class="btn btn-primary btn-lg">Back to Decorations gallary</a>
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding:none;">

            <!--Product data div tag start-->
        <div class="product_data"> 
            <div class="row">
                <div class="col-lg-12 order-lg-4 order-1">
                    <div class="image_selected_decor"><img src="{{asset('uploads/product_imgs/'.$product_details->image)}}" alt="Image"
        class="image-responsive" style="width:400px; height:auto;"></div>
                </div>
                <div class="col-md-8 order-5">
                    <div class="product_description"> 
                        <nav>

                        </nav>

                        <div><span style="font-size:25px;"><b>Name:</b></span> <span class="product_price" id="name">{{$product_details->product_name}}</span> </div>
                        <div><span style="font-size:25px;"><b>Price: Rs.</b></span> <span class="product_price" id="price">{{$product_details->unit_price}}</span><span style="font-size:25px;"><b>/=</b> </span> </div>
<!-- 
                        <hr class="singleline">

                        <ul>
                            <li>Lorem Ipsum is simply dummy text of the </li>
                            <li>Lorem Ipsum is simply dummy text of the </li>
                            <li>Lorem Ipsum is simply dummy text of the </li>
                            </ul> -->


                        <hr class="singleline">
                      <!-------------------------------------------------->
                      <?php 
                       $product_qty = $product_details->quantity; 
                     ?>
   <!-------------convert the above php variable into javascript variable-------------------->
                    <script type="text/javascript">
                    var prod_qty_fetched_into_see_more_page = "<?php echo  $product_qty; ?>";
                    </script>
               <!-------------------------------------------------->   
               <div class="row">
                        <div class="text-left">
                            <span style="font-size: 18px;color:purple;font-weight:bold"><i>Available Qty :
                            <?php 
                            $purchasable_qty = $product_qty - 250; 
                            echo $purchasable_qty;
                            ?> </i>
                            </span>
                        </div>
                            <div class="col-xs-6" style="margin-left: 13px;">
                            <span style="font-size:25px">Quantity:</span>  
                          
                <!--quantity increasing buttons-->
                <input type="hidden" class="product_id" value="{{$product_details->id}}">
                <div class="text-center">
                <div class="input-group my-quantity">
                <div class="minus-btn my-quantity" style="cursor: pointer">
                     <a class="btn btn-primary btn-lg">-</a>
                 </div>
                <input type="number" class="enter-qty text-center btn-qty" style="font-size:18px"  min="1" max="1000"  value="1" oninput="validity.valid||(value='');"/>
               
                <div class=" plus-btn my-quantity" style="cursor: pointer">
                        <a class="btn btn-primary btn-lg">+</a>
                   </div>
                </div>
                </div>
                <!--quantity increasing buttons-->
        <br>   <br>
    <div class="d-grid gap-2">
        <?php 
        if(($product_details->quantity) > 250 ){
        echo '<a class="add-to-mycart btn  " href="##" type="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Add to Cart</a>';

        }else{
            // echo '<span class="badge bg-danger"  style="font-size:11px" >Out of stock</span>';
           echo  '<a class="adding-disabled-btn btn btn-danger  " href="##" type="button"><i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp; Out of stock</a>';
          
        }
        ?>
       
        </div>

                             </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Product data div tag ends-->
                    </div>
                 <!--Product data div tag ends-->

            <div class="row row-underline">
                <div class="col-md-6"> <span class=" deal-text">Quick Status</span> </div>
                <div class="col-md-6"> <a href="#" data-abc="true"> <span class="ml-auto view-all"></span> </a> </div>
            </div>
            <div class="row">

                <div class="col-md-12">

                  <!--table-->
                  <table class="table border-primary table-bordered quickstatus">
   <tr id="quickstatustr">
   <td id="quickstatustd">
       <h4>Quantity</h4>
        <p>{{$product_details->quantity}}</p>
    </td>
    <td id="quickstatustd">
    <h4>Color form</h4>
        <p>{{$decor_details->color}}</p>
    </td>
    <td id="quickstatustd">
        <h4>Material</h4>
        <p>{{$decor_details ->material}}</p>
    </td>
    <td id="quickstatustd">
        <h4>Size</h4>
        <p>{{$decor_details ->size}}</p>
    </td>
    <td id="quickstatustd">
        <h4>xxx</h4>
        <p>xxxx</p>
    </td>
  </tr>



</table>




<div class="row row-underline">
    <div class="col-md-6"> <span class=" deal-text">About item</span> </div>
    <div class="text-center">
        <span>
           {{$decor_details->about_item}}
        </span>
    </div>
</div>




                </div>
            </div>
        </div>
    </div>
</div>




@endsection



@section('seemorescripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/custom.js') }}"></script>

<script>
$(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

            // Increment
            if(quantity>1){
            $('#quantity').val(quantity - 1);
            }
    });

});
</script>

@endsection
