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
                <a href="/quotations_list_page" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>
         
               
            <div class=" text-right">
                <span style="font-size:22px;">User ID :<?php echo Auth::user()->id;?></span>
            </div>
                  
            
        <div class="card">
            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">Request For Quotation</span>
               <div class="text-right">
                <span style="font-size: 18px;"> RFQ No : @foreach($rfq_handling_info  as $val) {{$val->id}} @endforeach </span>
            </div>
            </div>
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
           <div class="text-left">
             <span  style="font-size:15px;">
             @foreach($supplier_data as $supp_val) 
             <span  style="font-size:15px;">
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
                           
             
             <div class="text-left">
             <div><span  style="font-size:15px;color:black;color:black">
                                We at    
                                would like to request a price Quote for the following items.
              </span></div></p>


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

@endsection
