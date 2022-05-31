@extends('root.master_page')

@section('title')
Order Data
@endsection




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
@include('normal-user-pages.navbar')
@endsection


@section('content')


    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <br>
            <div class="text-left">
            <a href="/my_orders" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>
            <div class="text-center">
                <span style="font-size:25px;font-color:black"><strong>Shopping Cart Details</strong></span>
              </div>

          
                <!--alert-->
                {{-- @if (session('status'))
                <div class="text-center">
                <h4><div class="alert alert-success" role="alert">
                      {{ session('status') }}
                </div></h4>
                </div>
              @endif --}}
              <!--alert-->
          <br>
            <div class="col">
                <div class="form-group">
                   
            </div>
            </div>


            <div class="card-body">
                <div class="container">
                    <div class="box">
                      
<table class="table table-hover table-bordered " >
    <thead>
  <tr>
    <th>Order ID</th>
    <th>Product Name</th>
    <th>Unit price (LKR.)</th>
    <th>Quantity</th>
    <th>Sub total (LKR.)</th>
  
  </tr>
    </thead>
    <tbody> @php $total="0"; @endphp
        @foreach($order_data as $row)
  <tr>
    <td>{{$row->order_id}}</td>
    <td>{{$row->product_name}}</td>
    <td>
     
      <?php echo number_format($row->unit_price,2); ?>
    </td>
    <td>{{$row->num_of_items}}</td>
    <td>
    @php 
    $subtotal = "0" @endphp
    @php
    $subtotal =   $subtotal + ($row->unit_price) * ($row->num_of_items) 
    @endphp

    <?php echo number_format($subtotal,2)  ;?>
      
    </td>
  
    @php $total =  $total + ($row->unit_price) * ($row->num_of_items)  @endphp 
  
  </tr>
  @endforeach

  <tr>
    <th></th>
    <th></th>
    <th></th>
    <th>Deliver_charges (LKR.)</th>
    <th><?php 
     $del_cost = $cus_info->delivery_cost; echo $del_cost; ?></th>
  
  </tr>
  <tr>
    <th></th>
    <th></th>
    <th></th>
    <th>Total price </th>
    <th>
        <?php $total = $del_cost + $total;?>
        <?php echo "LKR : ".number_format($total,2); ?>
    </th>
  
  </tr>
    </tbody>
</table>
 

<div class="text-center">
<h3><b>Customer Information</b></h3>
</div>  

<div class="pull-center">
<table style="width:700px;" class="table  table-hover table-striped">
<tbody>
  <tr>
    <th style="width:160px">Order ID</th>
    <td><?php echo $cus_info->id; ?></td>
  </tr> 
  <tr>
  <th style="width:160px">First name</th>
  <td><?php echo $cus_info->first_name; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Last name</th>
  <td><?php echo $cus_info->last_name; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Phone no.</th>
  <td><?php  echo $cus_info->phone_no; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Alternate no.</th>
  <td><?php echo $cus_info->alternate_no; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Address line1</th>
  <td><?php   echo $cus_info->address_line1;?></td>
  </tr>

  <tr>
  <th style="width:160px">Address line2</th>
  <td><?php  echo $cus_info->address_line2; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Location (Click on the link)</th>
  <td style="height:50px"> <?php  echo $cus_info->location; 
  echo "<br>";
  ?>

</td>
  </tr>
  <tr>
  <th style="width:160px">Delivery charges</th>
  <td><?php echo $cus_info->delivery_cost; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Email</th>
  <td><?php echo $cus_info->email; ?></td>
  </tr>
  <tr>
  <th style="width:160px">City</th>
  <td><?php echo $cus_info->city; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Order placed at</th>
  <td><?php echo $cus_info->created_at; ?></td>
  </tr>
    </tbody>
</table>
</div>          
              
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>


    @endsection


    @section('datatablescripts')
    <script>
        $(document).ready(function() {
          $('#plant_list').DataTable();
      } );
       </script>

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!--SWEET ALERT LINKS-->
<script src="js/sweetalert.min.js"></script>


<!--SWEET ALERT LINKS-->
<script src="js/sweetalert.min.js"></script>
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
<!--DELETE MODAL SCRIPTS-->
<script>
    $(document).ready(function() {
      $('#decor_list').DataTable();

      

  } );
   </script>
<!--DELETE MODAL SCRIPTS-->



@endsection
