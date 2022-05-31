@extends('root.master_page')

@section('seemorepagestyles')
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
@endsection


@section('navbar')
@include('normal-user-pages.navbar')
@endsection



@section('content')

<div class="super_container">
    {{-- <a href="/fishfood_gallary" class="btn btn-primary btn-lg">Back to Fish food gallary</a> --}}
   
                      <!--alert-->
                      @if (session('status'))
                      <div class="text-center">
                        <div class="alert alert-danger" role="alert">
                              {{ session('status') }}
                        </div>
                      </div>
                      @endif
                      <!--alert-->
          
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding:none;">
            @foreach ($products as $product)

            <div class="row">
                <div class="col-lg-12 order-1">
                    <div class="image_selected"><img src="{{asset('uploads/product_imgs/'.$product->image)}}" alt="Image"
        class="image-responsive"  style="width:350px; height:300px;"></div>
                </div>
                <div class="col-md-8 order-5">
                    <div class="product_description">
                        <nav>

                        </nav>

                       

                        &nbsp;
                        <div class="text-right">
                        <a href="{{'more_details/'.$product->id}}" type="submit" class="btn btn-info">more details</a>
                        </div>
                        <div><span style="font-size:25px;"><b>Name:</b></span> <span class="product_price" id="name">{{$product->product_name}}</span> </div>
                        <div><span style="font-size:25px;"><b>Price: Rs.</b></span> <span class="product_price" id="price">{{$product->unit_price}}</span><span style="font-size:25px;"><b>/=</b> </span> </div>
                        <div><span style="font-size:25px;"><b>Availability :</b></span> <span class="product_price" id="price">{{$product->availability}}</span><span style="font-size:25px;"><b></b> </span> </div>
                        <hr class="singleline">

                        <ul>



                    <div class="row">
                            <div class="col-xs-6" style="margin-left: 13px;">
                            <h4>Qty:</h4>
        <!--quantity increasing buttons-->
        <input type="hidden" class="product_id" value="{{$product->id}}">
        <input type="number" class="qty-input form-control btn btn-default btn-lg btn-qty" value="1" min="1" max="100" />
            <!--quantity increasing buttons-->
        <br>   <br>
    <div class="d-grid gap-2">
        <a class="add-to-cart-btn btn  btn-lg " href="##" type="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Add to Cart</a>
        <a class="btn  btn-lg buy-it-nw-btn" href="#" type="button">Buy it Now</a>
        </div>


                        </div>
                    </div>
                    </div>
                </div>
            </div>






            @endforeach










</table>




                </div>
            </div>
        </div>
    </div>
</div>





@endsection



@section('seemorescripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!--quantity update query-->
    <script>
        //setting default attribute to disabled of minus button
        document.querySelector(".minus-btn").setAttribute("disabled", "disabled");

        //taking value to increment decrement input value
        var valueCount

        //taking price value in variable
        var price = document.getElementById("price").innerText;

        //price calculation function
        function priceTotal() {
            var total = valueCount * price;
            document.getElementById("price").innerText = total
        }

        //plus button
        document.querySelector(".plus-btn").addEventListener("click", function() {
            //getting value of input
            valueCount = document.getElementById("quantity").value;

            //input value increment by 1
            valueCount++;

            //setting increment input value
            document.getElementById("quantity").value = valueCount;

            if (valueCount > 1) {
                document.querySelector(".minus-btn").removeAttribute("disabled");
                document.querySelector(".minus-btn").classList.remove("disabled")
            }

            //calling price function
            priceTotal()
        })

        //plus button
        document.querySelector(".minus-btn").addEventListener("click", function() {
            //getting value of input
            valueCount = document.getElementById("quantity").value;

            //input value increment by 1
            valueCount--;

            //setting increment input value
            document.getElementById("quantity").value = valueCount

            if (valueCount == 1) {
                document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
            }

            //calling price function
            priceTotal()
        })
    </script>
    <!--quantity update query-->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
@endsection
