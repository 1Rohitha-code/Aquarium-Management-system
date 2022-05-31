@extends('root.master_page')

@section('seemorepagestyles')
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
@endsection 


@section('navbar')
@include('normal-user-pages.navbar')
@endsection



@section('content')



<div class="super_container">
    <a href="/predefined_gallary" class="btn btn-primary btn-lg">Back to Ponds gallary</a>
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding:none;">
          
                        <div class="row">

                    <div class="col-lg-12 order-lg-4 order-1">   
                        <div class="image_selected"><img src="{{asset('uploads/ponds/'.$data->image)}}" alt="Image"
                        class="image-responsive" style="width:400px; height:auto;">
                        </div>
                    </div>

                <div class="col-md-8 order-5">
                    <div class="product_description">
                        <div>
                            <span style="font-size:25px;"><b>Name:</b></span> <span class="product_price" id="name">{{$data->id}}</span> 
                        </div>
                        <div>
                            <span style="font-size:25px;"><b>Price: Rs.</b></span> <span class="product_price" id="price">{{$data->required_area}}</span><span style="font-size:25px;"><b>/=</b> </span> 
                        </div>                
                        <hr class="singleline">
                        <ul>
                            <div>
                                <span style="font-size:16px;"><b>Depth of pond :</b></span> <span class="product_price" id="price" style="font-size:16px;">{{$data->depth}}</span><span style="font-size:16px;"><b>/=</b> </span> 
                            </div>
                            <div>
                                <span style="font-size:16px;"><b>Required Time slot :</b></span> <span class="product_price" id="price" style="font-size:16px;">{{$data->duration}}</span><span style="font-size:16px;"><b>/=</b> </span> 
                            </div> 
                            <div>
                                <span style="font-size:16px;"><b>Total cost :</b></span> <span class="product_price" id="price" style="font-size:16px;">{{$data->total_cost}}</span><span style="font-size:16px;"><b>/=</b> </span> 
                            </div>  
                   
                            </ul>  
                    </div>     
            <hr class="singleline">  
  {{-- closest value to get store things --}}
  <div class="product_data">
    <!---------------------------area------------------------------------------>  
          <div class="row">
            <div class="col-xs-6" style="margin-left: 13px;">
                 <h4>Qty:</h4>                                
                            <input type="hidden" class="product_id" value="{{$data->id}}">
                            <input type="number" class="qty-input form-control btn btn-default btn-lg btn-qty" value="1" min="1" max="100" /> 
                            <br>   
                            <br>

                                <div class="d-grid gap-2">
                                <a class="add-to-cart-btn btn btn-lg" href="##" type="button"><i class=" fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Add to Cart</a>
                                <a class="btn  btn-lg buy-it-nw-btn" href="#" type="button">Buy it Now</a>
                                </div>

     
                             </div>
                         </div>
   <!----------------------------------area--------------------------->
                    </div>
    {{-- closest value to get store things --}}
                 </div>
            </div>
       
           
           
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
       <h4>Suitable for</h4>
        <p>{{$data->place}}</p>
    </td>
    <td id="quickstatustd">
    <h4>Water decoration</h4>
        <p>{{$data->dec_water_type}}</p>
    </td>
    <td id="quickstatustd">
        <h4>Plumbing type</h4>
        <p>{{$data->plmbing_type}}</p>
    </td>
    <td id="quickstatustd">
        <h4>Pumps for Pond</h4>
        <p>{{$data->pond_pumps}}</p>
    </td>
    <td id="quickstatustd">
        <h4>LED lightning</h4>
        <p>{{$data->led_lightning}}</p>
    </td>
</tr>
<tr>
    <td id="quickstatustd">
        <h4>Aquarium Plants</h4>
        <p>{{$data->aqua_plants}}</p>
    </td>
    <td id="quickstatustd">
        <h4>Filter type(s)</h4>
        <p>{{$data->filter_type}}</p>
    </td>
    <td id="quickstatustd">
        <h4>Fish type(s)</h4>
        <p>{{$data->fish_types}}</p>
    </td>
    <td id="quickstatustd">
        <h4>Stones and Gravel type(s)</h4>
        <p>{{$data->stones_gravel_type}}</p>
    </td>
    <td id="quickstatustd">
        <h4> </h4>
        <p> </p>
    </td>
  </tr>
  
 
  
</table>




{{-- <div class="row row-underline">
    <div class="col-md-6"> <span class=" deal-text">Description</span> </div>
    <div class="text-center">
        <span>
            {{$data->about_item}}
        </span>
    </div>
</div> --}}




                </div> 
            </div>
        </div>
    </div>
</div>




@endsection



@section('seemorescripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

   

 

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

@endsection