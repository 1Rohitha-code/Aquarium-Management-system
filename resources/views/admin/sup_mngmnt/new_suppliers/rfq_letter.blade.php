@extends('admin.root.master_page')

@section('title')
<title>RFQ Letter</title>
@endsection




@section('datatablestyle')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<link href="css/app.css" rel="stylesheet">
<link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<script src="//unpkg.com/feather-icons"></script>

<!--------------------------------------------------->

<!--------------------------------------------------->
@endsection


@section('content')


<div class="row">

    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="text-left">
                <a href="/edit_view_of_rfq_info/<?php echo $id; ?>" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>  
    
            <div class="card-header text-center">
                <span  style="font-size:24px;color:black;font-weight:bolder">RFQ Letter Common Preview </span>
                
            </div>
            <div class="card-header text-right">
               <span style="font-size: 18px;"> RFQ No : <?php echo $id; ?></span>
            </div>
            <div class="text-right">
                <a href="/edit_view_of_rfq_info/<?php echo $id; ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edit RFQ Information</a>
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
                                <?php echo  $date = date('Y-m-d', time());?>
                                </div> 
                                </div><br>
             <div class="card-header text-left">
             <span  style="font-size:15px;color:black;color:black">Supplier address: <br>
             <span  style="font-size:11px;color:black;color:red;">(supplier address will be added after sending the RFQ Letter )</span>
            </span>
             </div>
                            
                            </span>
                                </div>
             

             <p><span  style="font-size:15px;color:black;color:black">
                                We at    @foreach($get_admin_details as $admin_val) {{$admin_val->supplied_by}}     @endforeach
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
             @php $i=1 ; @endphp   @foreach($get_rfq_data as $data)
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
                    <br>
            
            <div class="text-left">
            <span  style="font-size:15px;color:black;color:black">
            Response expected date : @foreach($response_expected_date as $val) {{$val->response_expected_date}} @endforeach <br><br>
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
              <form method="post" action="/submit_rfq" enctype="multipart/form-data">
                            @csrf 
                            @foreach($get_rfq_no  as $val)  
                <input type="hidden" name="rfq_ref_id" value="{{$val->id}}">    
                @endforeach 

                @foreach($get_supplier_ids as $id)
                <input type="hidden" name="user_id[]" value="{{$id->id}}">    
                @endforeach 
                <input type="hidden" name="date_of_delivered" value=" <?php echo  $date = date('Y-m-d', time());?>"> 
              
                <input type="hidden" name="rfq_status" value="pending">
                <input type="hidden" name="rfq_status_updated_at" value="<?php echo  $date = date('Y-m-d', time());?>">

                <div class="text-right">
                    <button type="submit" class="btn btn-success rfq-letter" style="width:110px">Send &nbsp; <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
              </div>


              </form>
            </div>
        </div>
    </div>

@endsection



    @section('datatablescripts')
<!----------------------------------------------------------->
<script src="{{ asset('assets/checkout.js') }}"></script>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<!----------------------------------------------------------->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
     $('.rfq-letter').click(function (e){
    e.preventDefault();
    let form = $(this).parents('form');
    swal({
        title: 'Are you sure?',
        text: 'This RFQ will send for all new suppliers',
        icon: 'info',
        buttons: ["Cancel", "Yes.!"],
    }).then(function(value) {
        if(value){
            form.submit();
        }
        
    });
});


</script>



    <script>
        $(document).ready(function() {
          $('#po_items').DataTable();
      } );
       </script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<!--SWEET ALERT LINKS-->
<script src="js/sweetalert.min.js"></script>
<script>
    @if (session('status'))
swal.fire({
  title: '{{session('status')}}',
  icon: '{{session('statuscode')}}',
  button: "OK",
});
@endif
</script>
<!--SWEET ALERT LINKS-->

@endsection
