@extends('root.master_page')

@section('navbar')
@include('normal-user-pages.navbar')
@endsection


@section('content')
<div class="container-fluid p-0">
    <div class="row">

        @foreach($medicines as $medi)
        <div class="card-img-gallary" style="width: 14rem;">
            <div style="width:100%; text-align:center">
                <a href="/medi_profile/{{$medi->product_id}}" id="clickonimage">
                <img src="{{asset('uploads/product_imgs/'.$medi->image)}}" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <div class="text-left">
                <span class="user-plant-gallary-name" style="color:rgb(4, 4, 8)"><strong>Name:&nbsp;<span  style="color:blue;font-size:18px">{{$medi->product_name}}</span></strong></span><br>
                <span class="user-plant-gallary-name" style="color:rgb(4, 4, 8)"><strong>Price:Rs.&nbsp;<span  style="color:blue;font-size:18px">{{$medi->unit_price}}</span></strong></span>

                <span class="card-text" style="color:rgb(4, 4, 8)"><strong>Availability&nbsp; </strong></span>
               <!--compare the requested quantity with the available stock and allows to add item to the cart-->
           <?php
                if(($medi->quantity) <=250 ){
                  echo   '<span class="badge rounded-pill bg-danger"  style="font-size:12px" >Out of stock</span>';
                  }else{
                    echo '<span class="badge rounded-pill bg-primary"  style="font-size:13px" >In stock</span>';
                  }
                ?>
            <!--compare the requested quantity with the available stock and allows to add item to the cart-->     
                </div></a>
            
            </div>
              <div class="card-footer">
                  <div class="form-group">
                    <a href="/medi_profile/{{$medi->product_id}}" type="submit" class="btn btn-lg btn-block button3" ><strong>Add To Cart</strong></a>
                  </div>
                </div>
          </div>&nbsp;&nbsp;&nbsp;
        @endforeach
    </div>
</div>

@endsection

@section('seemorescripts')
<!--shopping cart count update links-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<!--shopping cart count update links-->
@endsection
