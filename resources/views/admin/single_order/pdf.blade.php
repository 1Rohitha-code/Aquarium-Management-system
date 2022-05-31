<!DOCTYPE html>
<html>
<head>
<style>


table {
  font-family: arial, sans-serif;
  font-size : 14px;
  width: 80%;
  align-items:center;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}


.center {
  margin-left: auto;
  margin-right: auto;
}


</style> 

</head>
<body>
  <container>
    <div class="card">
  <!---------------------PDF DOWNLOAD BUTTON HERE--------------------->
        <div class="card-body">

<span style="font-size:28px;text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 Customer Information</span>
     
<div>
     
<table style="width:700px" class="center">
<tbody>
  <tr>
    <th style="width:160px">Order ID</th>
    <td><?php echo $delivery_info->id; ?></td>
  </tr> 
  <tr>
  <th style="width:160px">First name</th>
  <td><?php echo $delivery_info->first_name; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Last name</th>
  <td><?php echo $delivery_info->last_name; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Phone no.</th>
  <td><?php  echo $delivery_info->phone_no; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Alternate no.</th>
  <td><?php echo $delivery_info->alternate_no; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Address line1</th>
  <td><?php   echo $delivery_info->address_line1;?></td>
  </tr>

  <tr>
  <th style="width:160px">Address line2</th>
  <td><?php  echo $delivery_info->address_line2; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Location (Click on the link)</th>
  <td style="height:50px"> <?php  echo $delivery_info->location; 
  echo "<br>";
  ?>

</td>
  </tr>
  <tr>
  <th style="width:160px">Delivery charges</th>
  <td><?php echo $delivery_info->delivery_cost; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Email</th>
  <td><?php echo $delivery_info->email; ?></td>
  </tr>
  <tr>
  <th style="width:160px">City</th>
  <td><?php echo $delivery_info->city; ?></td>
  </tr>
  <tr>
  <th style="width:160px">Order placed at</th>
  <td><?php echo $delivery_info->created_at; ?></td>
  </tr>
    </tbody>
</table>
</div>

   
<br>
<span style="font-size:28px;" class="h2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Shopping cart details
</span>

<div>
    
<table class="center">
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
     $del_cost = $delivery_info->delivery_cost; echo $del_cost; ?></th>
  
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
</div>
</div>
</div>
</container>
</body>
</html>
