<?php   

use Carbon\Carbon;
?>
@extends('root.master_page')

@section('datatablestyle')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<link href="css/app.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="assets/css/feather.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/feather-icons"></script>
@endsection

@section('navbar')
@include('supplier.navbar')
@endsection



@section('content')


<div class="row">

    <div class="col-12 col-xl-12">
    
    <div class="text-left">
                <a href="/edit_quotation_item_data/" class="btn btn-secondary btn-sm"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>
          
               
          
            
        <div class="card">
            <div class="card-header ">
           
                <div class="text-center">
               <span style="font-size:25px;font-weight:bold">Invoice</span>
                </div>
            </div>
            <form method="post" action="/save_invoice_details" class="rfq-qty-form" id="rfq-qty-form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="quot_id" value="<?php echo $quot_id;?>">
                            <input type="hidden" name="user_id" value="<?php foreach($get_admin_details as $val){echo $val->id;}?>">    
                            <input type="hidden" name="invoice_payment_status" value="<?php echo "pending";?>">
            <div class="card-body">
                <div class="text-right">
               <span style="font-size:15px;font-weight:bold">Reply Quotation ID : <?php echo $quot_id;?></span>
               <br>
               <span style="font-size:15px;font-weight:bold">Invoice Date :&nbsp;<?php  $mytime = Carbon::now();
              $current_date = date('Y-m-d', time()); echo $current_date;?></span>
                <br> <br>
                <span style="font-size:15px;"><b>Make payment before :</b></span>
                <br>
                <div class="pull-right">
                <input type="date" id="date_picker" class="form-control selected_date" style="width:200px" name="to_be_paid_before">
                </div>
                </div>
            <br>
                <div class="text-left">
                <span style="font-size:15px;font-weight:bold">Bill to :
                <br>
                @foreach($get_admin_details as $val)
                {{$val->name}}
               
                <br>
                Address:
                {{$val->contact_no}}
                <br>
                {{$val->address_line1}}
                <br>
                {{$val->address_line2}}
                @endforeach
                </span>
                </div>
                <br>
               
                <table class="table table-striped table-bordered " id="">
                    <thead>
                        <tr>
                            <th>No</th>
                        <th>Product name</th>
                        <th>Unit price</th>
                        <th>Required Qty</th>
                        <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $discount = "0"; @endphp
                    @php $total = "0"; @endphp
                        @php $sub_total = "0"; @endphp
                    @php $i="1"; @endphp 
                        @foreach($get_quot_items_details as $data)
                        <tr>
                           <td>
                        <?php echo $i;?>
                           </td> 
                           <td>
                              {{$data->supplier_stock_prod_name}} 
                              <input type="hidden" name="product_name[]" value="{{$data->supplier_stock_prod_name}} ">
                           </td> 
                           <td>
                           {{$data->unit_price}}  
                           <input type="hidden" name="unit_price[]" value="{{$data->unit_price}} "> 
                           </td> 
                           <td>
                           {{$data->requested_qty}} 
                           <input type="hidden" name="requested_qty[]" value="{{$data->requested_qty}}"> 
                           </td> 
                           <td>
                               

                               @php $sub_total = (($data->unit_price)*($data->requested_qty)) @endphp
                               LKR. <?php echo number_format($sub_total,'2');?>

                           
                            </td>
                        </tr>
                       @php $total = $total + (($data->unit_price)*($data->requested_qty)) @endphp
                       @if($sub_total >= 33000)
                           <?php $discount = $discount + $sub_total - ($sub_total * 0.1);
                        
                           ?>
                            @else
                                @continue;
                            @endif
                    @php $i++ @endphp
                    @endforeach
                    <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total payment :</td>
                            <td>LKR.<?php echo number_format($total,'2');?>

                            <input type="hidden" name="payment" value="<?php echo $total;?>">
                            <!-- after discount : -->
                            <?php number_format($discount,'2'); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <span >Thank you for your business.</span><br>
                <button type="submit" class="btn btn-success btn-block invoice-btn">Send Invoice</button>
</form>
                </div>
            </div>
        </div>
    </div>
    

@endsection


 
    
@section('datatablescripts')
   

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!--SWEET ALERT LINKS-->
<script src="js/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if (session('status'))
swal({
  title: '{{session('status')}}',
  icon: '{{session('statuscode')}}',
  button: "OK",
});
@endif
</script>
<!--SWEET ALERT LINKS-->
<script>
        $(document).ready(function() {
          $('#rfq_list').DataTable();
      } );
       </script>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);
    </script>


<script>
    $(document).ready(function () { 
       $('.invoice-btn').click(function (e) {

        var selected_date = document.getElementById('date_picker').value;

            if(selected_date == ""){
                e.preventDefault();
                swal("Pls Select a date", "");
            }else{
                    form.submit();

            }
           
           
           
        })
    });       
    </script>


@endsection
