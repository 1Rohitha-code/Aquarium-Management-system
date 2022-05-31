<?php

use App\Models\Delivery_Info;
use App\Models\Order_item;
use Dotenv\Loader\Value;
use Illuminate\Support\Facades\DB;?>

@extends('admin.root.master_page')

@section('title')
<title>Completed_order_list</title>
@endsection



@section('datatablestyle')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection



@section('navbar')
@include('admin.navbar')
@endsection


@section('content')
        <div class="container">

        <div class="card text-center" style="border:1px solid 	rgb(128,128,128);">
            <div class="card-header" style="height:30px">
                    <span style="font-size:large;color:black"><b>ONLINE PURCHASE MANAGEMENT REPORTS</b></span>
            </div><hr>
            <div class="card-body text-left" >
               <form action="/online_purchase" method="post" class="online-purchase-form">
               {{ csrf_field() }}
                <div class="container">
                <div class="row ">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Report category</label>
                        <select class="form-select onl-purchase-report-type"  aria-label="Default select example" id="online_purchase_type" name="online-cat">
                        <option selected>Select</option>
                        <!-- <option value="1">Analysing the profit of completed orders</option> -->
                        <option value="2">Delivery Tasks Report grouped by Deliverer</option>
                        <option value="3">Analysing Profit of completed orders</option>
                        <option value="4">Analysing the tendency of category wise purchasing</option>
                        <option value="5">Sales inspection Report</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">                 
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-3 ">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">From :</label>
                        <input type="date"  name="from" class="form-control my-colorpicker1 from-val" >
                        &nbsp;<span style="color:red">available from :<?php echo $min_date_val;?></span>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">To :</label>
                        <input type="date" name="to" id="inputTo" class="form-control my-colorpicker1 to-val" placeholder="Color" >
                        &nbsp;<span style="color:red">available to :<?php echo $max_date_val;?></span>
                    </div>

                    <!---------------code modification---------------------->
                    <div class="mb-3 col-md-3">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">To :</label>
                        <select class="form-select onl-purchase-report-type"  aria-label="Default select example" id="online_purchase_type" name="supplier">
                        <option selected>Select</option>
                       @foreach($products_sales_suppliers as $supplier)
                        <option value="{{$supplier->supplied_by}}">{{$supplier->supplied_by}}</option>
                         @endforeach   
                        </select>
                    </div>

 
                </div>
                </div>
        <div class="card-footer text-right">
            <button type="submit" id="pbtn"  class="btn btn-primary btn-lg pbtn" value="submit">Generate report</button>
        </div>
    </form>
</div>
        </div>
<!----------------------------------------------------------------------------------->

<div class="card text-center" style="border:1px solid 	rgb(128,128,128);">
            <div class="card-header" style="height:30px">
                    <span style="font-size:large;color:black"><b>SUPPLIER MANAGEMENT REPORTS</b></span>
            </div><hr>
            <div class="card-body text-left" >
               <form action="" method="post">
               {{ csrf_field() }}
                <div class="container">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Report category</label>
                        <select class="form-select" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="1">Most purchased items</option>
                        <option value="2">Monthly sales</option>
                        <option value="3">Daily sales</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">                 
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-3">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">From :</label>
                        <input type="date" name="supplied_by" class="form-control my-colorpicker1" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">To :</label>
                        <input type="date" name="color" class="form-control my-colorpicker1" placeholder="Color" >
                    </div>
                </div>
                </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary btn-lg">Generate report</button>
        </div>
    </form>
</div>
</div>
<!----------------------------------------------------------------------------------->
<div class="card text-center" style="border:1px solid 	rgb(128,128,128);">
            <div class="card-header" style="height:30px">
                    <span style="font-size:large;color:black"><b>INVENTORY MANAGEMENT REPORTS</b></span>
            </div><hr>
            <div class="card-body text-left" >
               <form action="" method="post">
               {{ csrf_field() }}
                <div class="container">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Report category</label>
                        <select class="form-select" >
                        <option selected>Select</option>
                        <option value="1">Most purchased items</option>
                        <option value="2">Monthly sales</option>
                        <option value="3">Daily sales</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">                 
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-3">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">From :</label>
                        <input type="date" name="supplied_by" class="form-control my-colorpicker1" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">To :</label>
                        <input type="date" name="color" class="form-control my-colorpicker1" placeholder="Color" >
                    </div>
                </div>
                </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary btn-lg">Generate report</button>
        </div>
    </form>
</div>
</div>
<!----------------------------------------------------------------------------------->
        </div>
@endsection


    @section('datatablescripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
<script src="js/sweetalert.min.js"></script>

<script>
    $(document).ready(function () { 
        $('.pbtn').click(function (e) {
        // var reportType = $(this).closest(".online-purchase-form").find('.onl-purchase-report-type').val();
            var from = $(this).closest(".online-purchase-form").find('.from-val').val();
            var to = $(this).closest(".online-purchase-form").find('.to-val').val();
            var min_date_val ="<?php echo $min_date_val;?>";
            var max_date_val ="<?php echo $max_date_val;?>";
   
            if((from == "") || (to == "")){
                e.preventDefault();
                swal("Date field is empty!", "");
            
            }else{
            
                        if(from >= min_date_val && from <= max_date_val && to >= min_date_val && to <= max_date_val && from <= to){
                            // alert("In between value is selected");
                        }else{
                        e.preventDefault();
                        swal("Out of available Date range", "");
                    
                        }
                }
        })
    });
            
  
       

    
    </script>


@endsection