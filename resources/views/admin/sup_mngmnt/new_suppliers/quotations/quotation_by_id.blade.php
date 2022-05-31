@extends('admin.root.master_page')

@section('title')
<title>List of RFQs</title>
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
                <a href="/list_of_suppliers_with_rfq/{{$rfq_id}}" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>
            
           
          
               
            <div class="text-center">
            <span style="font-size:22px"><b>Quotation ID : <?php echo $get_quotation_id->quotation_id; ?></b></span><br>
            <span style="font-size:22px"><b>RFQ ID :{{$rfq_id}}</b></span>
            </div>

           
            
            <div class="card-body">

          
          
            <div class="row">
                    <div class="mb-3 col-md-6">
                    <div class="card-header text-center">
                    <span style="font-size:22px"><b>Request for Quotation</b></span>
                    </div>
              <table id="rfq_list" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th style="width:30px">No</th>
                    <th style="width:50px">Product name</th> 
                    <th style="width:50px">Unit price</th> 
                    <th style="width:50px">Req. qty</th>    
                </tr>
                </thead>
                <tbody>
            @php $rfq_total="0"; @endphp
             @php $i=1 ; @endphp @foreach($get_rfq_data as $rfq)
             <tr>
                    <td>
                        <?php echo $i;?>  
                       </td>
                       <td>
                    {{$rfq->product_name}}
                        </td>
                        <td>
                    {{$rfq->unit_price}}
                        </td>
                        <td>
                    {{$rfq->required_qty}}
                        </td>
                      
                    </tr>

                   @php $rfq_total = $rfq_total + ($rfq->unit_price)*($rfq->required_qty) @endphp
            @php $i++ ; @endphp @endforeach
                </tbody>  
                <tr>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                          Total Cost :
                        </td>
                        <td>
                        <span style="color:green;border-bottom: 3px double;border-top:1px solid green;">
                        <?php echo "LKR.". number_format($rfq_total,2);?> 
                        </span>
                        </td>
                    </tr>      
            </table>
                    </div>

                    <div class="mb-3 col-md-6">
                    <div class="pull-right">
            <div class="input-group">
                            <div class="form-outline">
     <form method="post" action="/update_quot_status/<?php echo $get_quotation_id->quotation_id; ?>/<?php echo $user_id;?>/<?php echo $rfq_id; ?>" enctype="multipart/form-data">
        @csrf 
            <select name="quotation_status" class="form-select" aria-label="Default select example" style="width:200px;height:30px">
                                <option selected>Quotation Status</option>
                                <option value="Quotation accepted">Quotation accepted</option>
                                <option value="Quotation cancelled">Quotation cancelled</option>
                                </select>
                            </div>
                            <button  class="btn btn-primary selecte_items" style="height:30px;width:80px">Save &nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
    </form>
                        </div>
            </div><br>

            
                    <div class="card-header text-center">
                        <span style="font-size:22px"><b>Quotation data</b></span>
                    </div>
              <table id="quotation" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th style="width:30px">No</th>
                    <th style="width:30px">Product name</th>
                    <th style="width:50px">Unit price</th>
                    <th style="width:50px">Suppliable qty</th>    
                </tr>
                </thead>
                <tbody>    
                @php $quotation_total="0"; @endphp                
                @php $i=1 ; @endphp  @foreach($get_quotation_data as $quot_data)
                            
             <tr>
                    <td>
                    <?php echo $i;?>
                       </td>
                       <td>
                        {{$quot_data->supplier_stock_prod_name}}
                       </td>
                       <td>
                       {{$quot_data->unit_price}}
                        </td>
                        <td>
                        {{$quot_data->requested_qty}}
                      
                        </td>
                    </tr>
                    @php $quotation_total = $quotation_total + ($quot_data->unit_price)*($quot_data->requested_qty) @endphp
                    @php $i++ ; @endphp   @endforeach        
                </tbody>   
                <tr>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                          Total Cost :
                        </td>
                        <td>
                        <span style="color:green;border-bottom: 3px double;border-top:1px solid green;">
                        <?php echo "LKR.".number_format($quotation_total,2);?> 
                        </span>
                        </td>
                    </tr>     
            </table>
                    </div>
                </div>

             
            </div>
        </div>
    </div>

@endsection



    @section('datatablescripts')
<!----------------------------------------------------------->

<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<!----------------------------------------------------------->

<!------------this code is used for select all check boxes at once------------------>



    <script>
        $(document).ready(function() {
          $('#rfq_list').DataTable();
      } );
       </script>

<script>
        $(document).ready(function() {
          $('#quotation').DataTable();
      } );
       </script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>



@endsection
