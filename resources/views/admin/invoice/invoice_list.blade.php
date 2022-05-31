<?php 
use Illuminate\Support\Facades\Auth; ?>



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
                <!-- <a href="##" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a> -->
            </div>
         
         
        <div class="card" style="width:60rem">
            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">List of Invoices</span>
            </div>

            
            <div class="card-body">
              <table id="rfq_list" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th style="width:30px">No</th>
                    <th style="width:20px">Invoice. ID</th>
                    <th style="width:20px">Quot. ID</th>
                    <th style="width:50px">Supplier Name</th>
                    <th style="width:50px">Payment</th>
                    <th style="width:50px">To be paid at</th>
                    <th style="width:50px">Payment status</th>
                    <th style="width:50px">Payment settled at</th>
                    <th style="width:20px">Create GRN</th>
              
                </tr>
                </thead>
                <tbody>
                    @php $i= "1"; @endphp
                    @foreach($display_invoice_data as $val)
                    <tr>
                       <td>
                        <?php echo $i; ?>
                       </td> 
                       <td>
                         {{$val->id}}     
                       </td> 
                       <td>
                       {{$val->quot_id}}
                       </td> 
                       <td>
                       {{$val->supplied_by}} 
                       </td>
                       <td>
                       {{$val->payment}}
                       </td> 
                       <td>
                       {{$val->to_be_paid_before}}   
                       </td> 
                       <td>
                       {{$val->invoice_payment_status}} 
                       </td> 
                       <td>
                           @if($val->payment_settled_date == "0000-00-00" )
                              <?php echo "-"; ?>          
                           @else
                           <?php echo $val->payment_settled_date; ?> 
                           @endif
                       
                       </td> 
                       <td>

                       </td>
                    </tr>
                  
                    @php $i++; @endphp
                    @endforeach
                </tbody>        
            </table>
          
             
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
  icon: success,
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

@endsection
