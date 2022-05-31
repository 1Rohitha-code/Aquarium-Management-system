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
            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">Quotation</span>
            </div>

            
            <div class="card-body">
                <div class="text-right">
                    <span><i>Quotation ID :<?php echo $quotation_id; ?>  </i></span><br>
                    <span><i>RFQ ref ID:<?php echo $rfq_ref_id; ?> </i></span><br>
                    <span><i>User ID:<?php echo $user_id; ?> </i></span><br>

                </div><br>

                <div class="text-left">
           
            @foreach($supplier_data as $supplier)
               <span><i>Company name :{{ $supplier->supplied_by}} </i></span><br>  
                <span><i>Address : </i></span><br>  
                <span><i>{{ $supplier->address_line1}} </i></span><br>  
                <span><i>{{ $supplier->address_line2}}  </i></span><br>  
                <span><i>Date : <?php foreach($quotation_delivery_details as $date){ echo $date->quotation_delivered_date;}?></i></span>
                </div>
           @endforeach
            <br>
                <div class="text-left">
                  @foreach($get_admin_details as $admin)
                    <span><i>Admin</i></span><br>
                <span><i>  name : {{$admin->name}}</i></span><br>  
                <span><i> {{$admin->supplied_by}} </i></span><br>  
                <span><i>{{$admin->address_line1}}</i></span><br>  
                <span><i>{{$admin->address_line2}}</i></span><br>  
                @endforeach
                </div><br>
                                            <div class="text-center">
                                            <span style="font-size:20px;font-weight:bold"><u>Requested Item details</u></span>
                                            </div>
                      
                 
                     <div class="pull-right">
                     <span style="font-size:15px;font-weight:bold">Quotation Valid until : <?php foreach($quotation_delivery_details as $data){ echo $data->quotation_valid_until;}?></span>
                     
                    </div>   
               <br><br><br><br>                        
              <table id="" class="table table-bordered table-striped" style="border-color:black">
                <thead>
                <tr>
                <th style="width:30px">No</th>
                    <th style="width:80px">Product Name</th>
                    <th style="width:50px">Unit price (LKR.)</th>
                    <th style="width:50px">Requested qty</th>  
                    <th style="width:50px">Subtotal (LKR.)</th>  
                </tr>
                </thead>
                <tbody>
                @php $total="0" @endphp
             @php $i=1 ; @endphp @foreach($get_quotation_item_details as $product)
             <tr>
                    <td>
                        <?php echo $i;?>  
                       </td>
                       <td>
                       {{$product->supplier_stock_prod_name}}
                       </td>
                      
                       <td>
                       {{$product->unit_price}}
                       </td>
                       <td>
                       {{$product->requested_qty}}
                        </td>
                       <td>
                       <div class="text-center">
                        <?php $subtotal= ($product->unit_price) * ($product->requested_qty); echo number_format($subtotal,2); ?>
                        </div>

                       </td>
                      
                    </tr>
                 
                    @php 
                       $total = $total + ($product->unit_price) * ($product->requested_qty) ;
                      @endphp
                    
            @php $i++ ; @endphp @endforeach
                </tbody>     
                <tfoot> 
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <span style="font-size: 15px;font-weight:bold">Total price</span>
                        </td>
                        <td>
                            <div class="text-center">
                        <span class="doubleUnderline" style="font-size: 15px;font-weight:bold">LKR.  <?php echo  number_format($total,2);?></span>

                            </div>
                        </td>
                    </tr>
                </tfoot>   
            </table>
           

          
             <span>If you have any questions concerning this quotation, contact this phone number/email.</span>
             <br>

             <div class="text-center">
             <span style="font-size: 25px;">Thank you for your Business</span>
            </div><br>
           
            </div>
            </div>
        </div>
    </div>
    
    </div>
</div>
</div>
</container>
</body>
</html>
