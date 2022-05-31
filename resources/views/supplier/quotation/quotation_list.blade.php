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
         
            <div class=" text-right">
                <span style="font-size:22px;">User ID :<?php echo Auth::user()->id;?></span>
            </div>
          
            
        <div class="card" style="width:60rem">
            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">List of Quotations</span>
            </div>

            
            <div class="card-body">
              <table id="rfq_list" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th style="width:30px">No</th>
                    <th style="width:20px">Quot. ID</th>
                    <th style="width:50px">Quot. delivered date</th>
                    <th style="width:50px">Quotation Valid until</th>
                    <th style="width:30px">Quot.Status</th>  
                    <th style="width:50px">Status updated at</th> 
                    <th style="width:50px">Quotation</th>  
                    <th style="width:20px">RFQ Details</th>  
                    <th style="width:80px">Prepare Invoice</th>  
                </tr>
                </thead>
                <tbody>  
                    @foreach($display_invoice_status as $invoice)
                    @endforeach
             @php $i=1 ; @endphp @foreach($quotation_handling_information as $data)
             <tr>
                    <td>
                        <?php echo $i;?>  
                       </td>
                       <td style="width:20px"> 
                        {{$data->id}}
                       </td>
                       <td>
                       {{$data->quotation_delivered_date}}
                    </td>
                       <td>
                       {{$data->quotation_valid_until}}
                       </td>
                       <td style="width:30px">
                    @if($data->quotation_valid_until < $data->quot_status_updated_date)
                        <?php echo "<span style='color:red'>Quotation Expirered!</span>"; ?>
                    @else
                            <!------foreach of this if condition is out from this foreach-------------->
                            @if(($data->id == $invoice->quot_id) || ($invoice->quot_id != NULL))
                               <a href="/display_invoice_list" class="btn btn-primary">invoice sent</a> 
                            @else
                                {{$data->quotation_status}} 
                            @endif
                      
                    

                    @endif
                       

                        </td>
                        <td>
                       {{$data->quot_status_updated_date}}
                        </td>
                       <td>
                       <div class="text-center">
                       <a href="/quotation_pdf/{{$data->rfq_ref_id}}/{{$data->id}}" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                   
                        </div>
                       </td>
                       <td>
                       <div class="text-center">
                       <a href="/see_rfq_details/{{$data->rfq_ref_id}}/<?php echo Auth::id();?>" class="btn btn-info btn-sm"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
                        </div>
                       </td>
                       <td>
                       <div class="text-center"> 
                       @if($data->quotation_valid_until < $data->quot_status_updated_date)
                       <a href="#" class="btn btn-danger" disabled>action</a>             
                       @else 
                            @if($data->quotation_status == 'Quotation accepted')
                                    @if(($data->id == $invoice->quot_id) || ($invoice->quot_id != NULL))
                                    <a href="##" class="btn btn-secondary btn-sm"><i class="fa fa-window-close" aria-hidden="true"></i>&nbsp;</a>             
                                    @else
                                    <a href="/display_invoice_page/{{$data->id}}" class="btn btn-primary btn-sm"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;<i class="fa fa-caret-right" aria-hidden="true"></i></a>             
                                    @endif
                           
                            @else
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-window-close" aria-hidden="true"></i></a>
                            @endif
                       
                       @endif
                       
                        </div>
                       </td>
                    </tr>
            @php $i++ ; @endphp @endforeach
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
