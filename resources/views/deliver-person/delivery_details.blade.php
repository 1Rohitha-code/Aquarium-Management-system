@extends('root.master_page')


@section('seemorepagestyles')



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<link href="assets/css/feather.css" rel="stylesheet" type="text/css">

@endsection

@section('navbar')
@include('deliver-person.navbar')
@endsection


@section('content')

<div class="container">
<div class="text-left">
                    <a href="/order_details" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
                </div>
    <div class="card">
        <div class="card-body">
            <div class="panel panel-default">   
            <div class="text-center">        
                <h3>Customer Information</h3>
            </div>
            
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
  <tr>
  <th style="width:160px">Total price (LKR.)</th>
  <td><?php echo $cus_info->total_price; ?></td>
  </tr>
    </tbody>
</table>
</div>

   
<br>


            </div>
        </div>
    </div>
</div>
@endsection



@section('datatablescripts')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>




@endsection
