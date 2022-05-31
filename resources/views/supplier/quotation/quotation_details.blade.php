
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
                <a href="/edit_quotation_item_data/<?php echo $get_rfq_ref_id; ?>/<?php echo $quotation_id; ?>" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>
         
               
          
            
        <div class="card">
            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">Quotation</span>
            </div>

            
            <div class="card-body">
                <div class="text-right">
                    <span><i>Quotation ID :<?php echo $quotation_id; ?>  </i></span><br>
                    <span><i>RFQ ref ID:<?php echo $get_rfq_ref_id; ?> </i></span><br>
                    <span><i>User ID:<?php echo $user_id; ?> </i></span><br>

                </div>

                <div class="text-left">
           
            @foreach($supplier_data as $supplier)
               <span><i>Company name :{{ $supplier->supplied_by}} </i></span><br>  
                <span><i>Address : </i></span><br>  
                <span><i>{{ $supplier->address_line1}} </i></span><br>  
                <span><i>{{ $supplier->address_line2}}  </i></span><br>  
                <span><i>Date : <?php echo $current_date; ?></i></span>
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
                </div>
                                            <div class="text-center">
                                            <span style="font-size:20px;font-weight:bold"><u>Requested Item details</u></span>
                                            </div>
             <form action="/store_quotation_delivery_details/<?php echo $quotation_id; ?>/<?php echo $get_rfq_ref_id; ?>/<?php echo $user_id; ?>" method="post" enctype="multipart/form-data">
                  @csrf            
                  <input  type="hidden" name="quotation_delivered_date"  value="<?php echo $current_date; ?>" style="width:200px" class="form-control">
                     <div class="pull-right">
                     <span style="font-size:15px;font-weight:bold">Quotation Valid until :</span>
                     <input name="quotation_valid_until" id="date_picker" style="width:200px" type="date" class="form-control" >
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
             @php $i=1 ; @endphp @foreach($get_product_details as $product)
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
                        <input name="total_price" style="width:200px" type="hidden" class="form-control" value="<?php echo $total;?>">
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
            <div class="text-center">
            <button type="submit" style="width:900px" value="submit" class="btn btn-success submit-btn"><span style="font-size:17px;font-weight:bold">SUBMIT</span></button>
                </form>
                </div>
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
<script>
 $('.submit-btn').click(function (e){
    e.preventDefault();
    let form = $(this).parents('form');
    swal({
        title: 'Are you sure?',
        text: '',
        icon: 'info',
        buttons: ["Make Changes", "Yes.!"],
    }).then(function(value) {
        if(value){
            form.submit();
        }
        
    });
});

</script>


<script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);
    </script>
@endsection
