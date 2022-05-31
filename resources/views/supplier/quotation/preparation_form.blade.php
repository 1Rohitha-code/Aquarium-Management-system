<?php
use Illuminate\Support\Facades\Auth;
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


          
            
        

<!--------------------------------------------------------------->
    <div class="row">
        <div class="mb-4 col-md-5">
        <div class="card" style="width:385px;">
            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">RFQ Details</span>
            </div>
            <div class="card-body">
     
                    <table id="" class="table table-bordered">
              <tbody>
                  @foreach($rfq_data as $val)
                <tr>
                  <th style="width:150px">RFQ No</th>
                  <td><strong>
                      <div class="text-center">
                      {{$val->id}}
                      </div>
                    </strong></td>
                </tr>
                @endforeach
              <tr>
                  <th>RFQ Status</th>
                  <td>
                    <div class="input-group">
                  <div class="form-outline">
                 
                  @foreach($rfq_status as $product)
                  <form class="quot_prep_form" action="/rfq_status_updation/<?php echo $product->rfq_no ; ?>/<?php echo Auth::id();?>" id="quot_prep_form" method="post" enctype="multipart/form-data">
                  @csrf
    
                              <select  name="rfq_status" id="status_val" class="form-select status_val" aria-label="Default select example" style="width:120px;height:38px">
                                  <option value="pending" {{($product->rfq_status === 'pending') ? 'Selected' : ''}}>Pending</option>
                                  <option value="accepted" {{($product->rfq_status === 'accepted') ? 'Selected' : ''}}>Accepted</option>
                                  <option value="cancelled" {{($product->rfq_status === 'cancelled') ? 'Selected' : ''}}>Cancelled</option>
                                  </select>
          
                                 
                              </div>
                              <button type="submit" value="submit" class="btn btn-primary selecte_items" style="height:38px;width:60px"> &nbsp;<i class="fa fa-refresh" aria-hidden="true"></i></button>
                                    </div>
                         </form> 
                         @endforeach 
                  </td>
              </tr>
                <tr>
                <td colspan="2" style="font-weight: bolder;">
                <div class="text-center">
                Requested Items
                </div>
                </td>
                </tr>
                <tr>
                  <th >Product name</th>
                  <th  >Required qty</th>
                </tr>
                <tr>
                @foreach($rfq_content_info as $product)

              
                  <td  style="color:green">{{$product->product_name}}</td>
                  <td  style="color:green">{{$product->required_qty}}</td>
                </tr>
           
                @endforeach
                </tr>
                </tr>
                @foreach($rfq_data as $val)
                <tr>
                <th style="width:110px">Response Expected Date</th>
                  <td>{{$val->response_expected_date}}</td>
                </tr>
                <tr>
                <th style="width:110px">Date of delivered</th>
                  <td>{{$val->date_of_delivered}}</td>
                </tr>
            @endforeach
              </tbody>
            </table>
             
            </div>
            </div>       
        </div>
        <div class="mb-3 col-md-5">
        <div class="card" style="width:565px">
            <div class="card-header text-center"> 
               <span style="font-size:25px;font-weight:bold">Select items to prepare Quotation</span>
            </div>

            
            <div class="card-body">

            <form method="post" action="/save_prod_items/<?php foreach($rfq_data as $val) { echo $val->id; }; ?>" enctype="multipart/form-data">
                            @csrf
             <input type="hidden" name="rfq_ref_id" value="<?php foreach($rfq_data as $val){ echo $val->id;}?>">  
             <input type="hidden" name="rfq_response_expected_date" value="<?php foreach($rfq_data as $val){ echo $val->response_expected_date;}?>">              
             <input type="hidden" name="rfq_date_of_delivered" value="<?php foreach($rfq_data as $val){ echo $val->date_of_delivered;}?>"> 
             
             
                            <div class="pull-right">
                      
                            <button  class="btn btn-primary submit-button" style="height:35px;width:110px">Continue &nbsp;<i class="fa fa-step-forward" aria-hidden="true"></i></button>
                        </div>
                        <br><br>
                        <div class="get_req_qty">
            <table id="item_store" class="table table-bordered table-striped" style="width:550px">
              <thead>
              <tr>
   
                <th>Product name</th>
                <th style="width:60px">Stock Qty</th>
                <th style="width:60px">RFQ Qty</th>
                <th style="width:135px">Stock availability</th>
                <th>Action <br>
                    <div class="text-center">
                        <input  type="checkbox" style="border-color:black;width:25px;height:20px" class="form-check-input" onClick="toggle(this)" />
                    </div>
                    </th>
              </tr>
              </thead>
              <tbody>
           

              @php $counter = 0; @endphp
              @foreach($result as $sup_tbl)
                <tr>
                  <td>
                            <?php echo $sup_tbl['product_name']; ?>
                  </td>
                  <td>

                  <?php echo $sup_tbl['quantity'];?>

                  </td>
                  <td>
                    <div class="inputForm">
                    @foreach($rfq_content_info as $rfq_data)
                          @if( $rfq_data->product_name ==  $sup_tbl['product_name'])
                      <input id="req_qty" type="text" class="form-control" value="<?php echo $rfq_data->required_qty; ?>" disabled>
                          @else
                          @continue
                          @endif
                    @endforeach
                    </div>
                  </td>
              
                  <td>
                <div class="tagValue">
                    @foreach($rfq_content_info as $rfq_data)
                          @if( $rfq_data->product_name ==  $sup_tbl['product_name'])
                              @if($rfq_data->required_qty < $sup_tbl['quantity'])
                              <input type="text" style="color:green;background-color:antiquewhite" class="form-control" value="<?php $status = ""; $status= "Available"; echo $status;?>" disabled>
                              @else
                              <input id="notenough" type="text" style="color:green;background-color:antiquewhite" class="form-control" value="<?php $status= "Not enough Qty.";echo $status;?>" disabled>
                             
                              @endif
                            
                          @else
                            @continue
                          @endif
                    @endforeach
                </div>
                  </td>
                  <td id="checkbox_tag">
               
                  <div class="text-center">
         
                 
                    <input id="chkBoxID" onclick="assignId()" type="checkbox" style="width:25px;height:20px;border-color:black" class="form-check-input" name="supplier_stock_item_ids[]"  value="<?php echo  $sup_tbl['id']; ?>" > 
                  
                    </div>
        
                  </td>              
                </tr>
             @endforeach
             </form>
              </tbody>
            </table>
            </div>
            </div>
            </div>        
         </div>
       </div>
<!--------------------------------------------------------------->
            
 

@endsection



    
@section('datatablescripts')
   

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

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
<script>
        $(document).ready(function() {
          $('#item_store').DataTable();
         
        } );
       </script>

<!------------this code is used for select all check boxes at once------------------>
<script>
  function toggle(source) {
  checkboxes = document.getElementsByName('supplier_stock_item_ids[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }

}
   </script>

<!----------------validating continue button before updating status field------------------------------------->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function () { 
       $('.submit-button').click(function (e) {
           //below variable takes the value from RFQ status
            var selected_value =document.getElementById("status_val").value;
              //And if the variable value is pending, it prevents form submission.
            
            if(selected_value == "pending"){
                e.preventDefault();
                let form = $(this).parents('form');
                swal("Pls Update RFQ Status as 'Accepted' before continue", "");

            }else{ 
                //If the checkboxes are not checked, then also form submission prevents
                e.preventDefault();
                let form = $(this).parents('form');
                var atLeastOneIsChecked = $('input[name="supplier_stock_item_ids[]"]:checked').length > 0;
                $('#checkbox').is(':checked');  
                if(atLeastOneIsChecked == false){
                     swal("Pls check atleast one checkbox", "");
                }else{
                    form.submit();
                }       
            }
        })
    });       
    </script>




@endsection
