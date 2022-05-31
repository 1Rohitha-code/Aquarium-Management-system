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
 REQUEST FOR QUOTATION</span>
  <!---------------------------------------------------------------->
   
            <div class="card-header pull-right">
               <span style="font-size: 18px;"> RFQ No : @foreach($rfq_handling_info  as $val) {{$val->id}} @endforeach </span>
            </div><br>

            
            <div class="card-body">
                                <div class="card-header text-right">
                                <span  style="font-size:14px;color:black;color:black">
                                <div class="pull-right">
                                <div class="form-floating mb-3">
                                @foreach($get_admin_details as $admin_val)
                                <span  style="font-size:14px;color:black;color:black">{{$admin_val->supplied_by}}<br>
                                {{$admin_val->address_line1}}<br>
                                @endforeach
                                @foreach($rfq_handling_info  as $val) {{$val->date_of_delivered}} @endforeach 
                            
                                </div>
                                </div><br>
             <div class="card-header text-left">
             <span  style="font-size:15px;color:black;color:black">
             @foreach($supplier_data as $supp_val) 
             <span  style="font-size:15px;color:black;">
             Supplier : <br> 
             {{$supp_val->name}}<br>
             {{$supp_val->supplied_by}}<br>
             {{$supp_val->address_line1}}<br>
             {{$supp_val->address_line2}}<br>
             </span>
             @endforeach<br>

            </span>
             </div>
                            
                            </span>
                                </div>
             

             <p><span  style="font-size:15px;color:black;color:black">
                                We at    
                                would like to request a price Quote for the following items.
              </span></p>


              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th style="width:30px">No</th>
                    <th style="width:80px">Product name</th>
                    <th style="width:50px">Required Qty</th>  
                </tr>
                </thead>
                <tbody>
             @php $i=1 ; @endphp    @foreach($get_rfq_items as $data)
                    <tr>
                    <td>
                        <?php echo $i;?>  
                       </td>
                       <td>
                       {{$data->product_name}}
                       </td>
                       <td>
                       {{$data->required_qty}}
                       </td>
                    </tr>
            @php $i++ ;  @endphp  @endforeach
                </tbody>         
            </table>
            <p><span  style="font-size:15px;color:black;color:black">
                    We are in a position to purchase these goods immediatly if the price is within our allocated budget.
                                    Please feel free to contact me if you need any further information in order to provide us with a firm price.
                                    <br>
                    We look forward to hearing from you.
                    <br><br>
            
            <div class="text-left">
            <span  style="font-size:15px;color:black;color:black">
            Response expected date : @foreach($rfq_handling_info  as $val) {{$val->response_expected_date}} @endforeach <br><br>
            </span>
            </div>
                    

            <div class="text-left">
            <span  style="font-size:15px;color:black;color:black"> Sincerely,<br>
            Name : @foreach($get_admin_details as $admin_val) {{$admin_val->name}} <br>
            Name of the Company : {{$admin_val->supplied_by}}<br>
            Tel : {{$admin_val->contact_no}}     
            @endforeach <br>
            </span>
            </div>
              </span></p>
  <!------------------------------------------------------>
</div>
</div>
</div>
</container>
</body>
</html>
