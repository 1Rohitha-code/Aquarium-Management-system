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
    <div class="text-left">
                <a href="/back_to_pick_items_page/<?php echo $get_rfq_ref_id; ?>" class="btn btn-secondary btn-sm"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>
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
                  <form action="/rfq_status_updation/<?php echo $product->rfq_no ; ?>/<?php echo Auth::id();?>" method="post" enctype="multipart/form-data">
                  @csrf
    
                              <select  name="rfq_status" class="form-select rfq_status" aria-label="Default select example" style="width:120px;height:38px">
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
        <div class="card" style="width:565px;">
        
            <div class="card-header">
           
            
               <span style="font-size:25px;font-weight:bold">Requested Qty insertion form</span>
               </div>
          
        
            <div class="card-body" >
              
            
            <form method="post" action="/store_quotation_item_data/{{$get_quotation_id->id}}/{{$get_quotation_id->rfq_ref_id}}" enctype="multipart/form-data">
                            @csrf
             <input type="hidden" name="rfq_ref_id" value="<?php foreach($rfq_data as $val){ echo $val->id;}?>">  
             <input type="hidden" name="rfq_response_expected_date" value="<?php foreach($rfq_data as $val){ echo $val->response_expected_date;}?>">              
             <input type="hidden" name="rfq_date_of_delivered" value="<?php foreach($rfq_data as $val){ echo $val->date_of_delivered;}?>"> 
             
             
             <div class="pull-right">
                  <button type="submit" value="submit" class="btn btn-primary submit-button" style="height:35px;width:110px">Continue &nbsp;<i class="fa fa-step-forward" aria-hidden="true"></i></button>
              </div>
                     
                        <br><br>
                        <div class="get_req_qty">
                          <span style="font-size: 14px;color:red">*** Some of the Items have been ignored by the system because of your stock quantity is less than the requested product quantity. </span>
             
             <table id="item_store" class="table table-bordered table-striped" style="border:1px solid black;width:550px">
              <thead>
              <tr>
                <th style="width:20px">No</th>
                <th style="width:60px">Product name</th>
                <th style="width:30px">Unit price</th>
                <th style="width:60px">Stock Qty</th>
                <th style="width:60px">Requested Qty</th>
              
              </tr>
              </thead>
              <tbody>@php $i=1; @endphp
           @foreach($retrieve_stored_items as $data)
          
                @if($data->supplier_stock_prod_qty > $data->required_qty)
                <td>
              <?php echo $i; ?>
              </td>
                <td>
                <input type="hidden" name="supplier_stock_prod_id[]" value="<?php echo $data->supplier_stock_prod_id; ?>">
                  <input type="hidden" name="supplier_stock_prod_name[]" value="<?php echo $data->supplier_stock_prod_name; ?>">
              {{$data->supplier_stock_prod_name}}
                </td>
                <td>
                <input type="hidden" name="unit_price[]" value="{{$data->unit_price}}">
                 {{$data->unit_price}}
                </td>
                <td>
                <input type="hidden" name="supplier_stock_prod_qty[]" class="form-control" value="{{$data->supplier_stock_prod_qty}}" >
                {{$data->supplier_stock_prod_qty}}
                </td>
              <td>
                  @if($data->required_qty != NULL)
                  <input type="text" name="requested_qty[]" class="form-control" value="{{$data->required_qty}}" >
                  @else
                  <input type="text"  name="requested_qty[]" style="background-color:white" class="form-control" value="{{$data->required_qty}}" placeholder="enter Qty">
                  @endif
              
        
              </td>
                @else
                @continue
                @endif
                
                </form>
                </tr>
          @php $i++; @endphp   @endforeach
           
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
  checkboxes = document.getElementsByName('product_ids[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }

}
   </script>


<!------------------------------------------------------->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script>
    $(document).ready(function () { 
       $('.submit-button').click(function (e) {
           //below variable takes the value from RFQ status
            var selected_value =document.getElementById("rfq_status").value;
              //And if the variable value is pending, it prevents form submission.
            if(selected_value == "pending"){
                e.preventDefault();
               
                let form = $(this).parents('form');
                swal("Pls accept RFQ Status before continue", "");

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
