<?php

use App\Models\Delivery_Info;
use App\Models\Order_item;
use Dotenv\Loader\Value;
use Illuminate\Support\Facades\DB;?>

@extends('admin.root.master_page')

@section('title')
<title>BRIGHT AQUA -Day to Day Delivery Tasks Report</title>
@endsection



@section('datatablestyle')
<!-- 
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> -->
<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> -->
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script> -->
<!-- <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" > </script>  -->

<!-- 
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
@endsection



@section('navbar')
@include('admin.navbar')
@endsection


@section('content')

<div class="row">

    <div class="col-12 col-xl-12">
        <div class="card"> 
            <div class="text-left">
                <a href="/report_generation" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>
            <div class="card-header text-center">
                <span  style="font-size:26px;color:black;"><u><b>BRIGHT AQUA - Day to Day Delivery Tasks Report</b></u></span>
            </div>
     
            <div class="card-body">
            <div id = "pdf">
            <table id="online-p" class="table table-striped table-hover table-bordered user_roles" style="color:black;border:1px solid black">
                    <thead>
                        <tr>
            <th style="width:10px">No.</th>
            <th style="width:10px">Order ID</th>
            <th  style="width:230px">Deliverer Name</th>
            <th style="width:240px"><div class="text-center">Collected payment(LKR)<br><span style="font-size:10px;">(calculated with sellable price)</span></div></th>
            <th style="width:50px"><div class="text-center">Collected payment(LKR)<br><span style="font-size:10px;">(calculated with original price)</span></div></th>
            <th style="width:70px">Order Destination</th>
            <th style="width:100px">Deliver Charges</th>
            <th style="width:50px">Order Completed Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $total = "0" @endphp
                    @php $ttl_deliver_charges = "0" @endphp
                    @php $ttl_pay_with_original_price = "0" @endphp
                    @php $i=1;@endphp    
                    @foreach($del_compl_data as $value)
                        <tr>
                            <td>
                           <div class="text-center">
                           <?php echo $i;?>
                           </div>
                            </td> 
                            <td>
                            <div class="text-center">
                                {{$value->order_id}}
                            </div>
                            </td>
                            <td>
                            <div class="text-left">
                                {{$value->name}}
                            </div>
                            </td>
                            <td>
                            <div class="text-center">
                                {{$value->order_total}}
                            </div>
                            </td>
                            <td>
                            <div class="text-center">
                <!--------------this code is used to get collected payment according to the original price---------------------------------------------------------->
                       @foreach($payment_calculated_without_profit as $opttl)
                                    @if($opttl->order_id == $value->order_id)
                                        {{$opttl->tp_without_profit}}    
                                    @else
                                            @continue
                                    @endif
                                @endforeach
                <!------------------------------------------------------------------------>
                            </div>
                            </td>
                            <td>
                            <div class="text-center">
                                {{$value->city}}
                            </div>
                            </td>
                           <td>
                           <div class="text-center">
                                {{$value->delivery_cost}}
                            </div>
                          </td>
                        <td>
                        <div class="text-center">
                                {{$value->order_completed_date}}
                            </div>
                        </td>
                        </tr>     
                        @php $total =   $total + ($value->order_total) @endphp
                        @php $ttl_deliver_charges =   $ttl_deliver_charges + ($value->delivery_cost) @endphp  
                        @php  $ttl_pay_with_original_price =    $ttl_pay_with_original_price + ($opttl->tp_without_profit) @endphp  
                      
                        @php    $i++ ; @endphp 
                        @endforeach
                  <tr>
                     <td style="display:none;"><?php echo ($value->order_id)+100000;?></td>
                     <td></td>
                     <td style="color:green"><b>Total Payment calculated with sellable price (LKR)</b></td>
                     <td> 
                         <div class="text-left">
                     <span style="color:green;border-bottom: 3px double;border-top:1px solid green;">
                     <b> = {{ number_format($total, 2) }}/=</b>
                     </span>
                         </div>
                    </td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td style="display:none;"><?php echo ($value->order_id)+100000;?> </td>
                     <td></td>
                     <td style="color:green"><b>Total Payment calculated with origninal price (LKR)</b></td>
                     <td>
                     <div class="text-left">
                     <span style="color:green;border-bottom: 3px double;border-top:1px solid green;">
                     <b>= {{ number_format($ttl_pay_with_original_price, 2) }}/=</b>
                     </span>
                         </div>
                     </td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                    <td style="display:none;"><?php echo ($value->order_id)+100000;?> </td>
                     <td></td>
                     <td style="color:green"><b>Profit (LKR)</b></td>
                     <td>
                     <div class="text-left">
                     <span style="color:green;">
                     <b>= {{ number_format($total, 2) }} - {{ number_format($ttl_pay_with_original_price, 2) }}</b>
                     <br>
                     <?php $profit = $total - $ttl_pay_with_original_price;?>
                     <div class="text-left">
                     <span style="color:green;border-bottom: 3px double;border-top:1px solid green;">
                     <b> ={{ number_format($profit, 2) }}/=</b>
                     </span>
                     </div>
                     </span>
                         </div>
                     </td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td style="display:none;"><?php echo ($value->order_id)+100000;?></td>
                     <td></td>
                     <td style="color:green"><b>Total Deliver Charges (LKR)</b></td>
                     <td> 
                         <div class="text-left">
                     <span style="color:green;border-bottom: 3px double;border-top:1px solid green;">
                     <b> =  {{ number_format($ttl_deliver_charges , 2) }}/=</b>
                     </span>
                         </div>
                    </td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                    </tbody>
                
                 
            </table>


                </div>
            </div>
        </div>


    </div>
@endsection


    @section('datatablescripts')
 
<script>
   $(document).ready(function() {
    $('#online-p').DataTable( {
        dom: 'Bfrtip',
        "bFilter": false,
        "bPaginate": false,
        "bInfo": false,
        buttons: [
            
            
            { extend: 'excel', footer: true,
                orientation: 'landscape',
        exportOptions: {
        columns: [1,2,3,4,5,6],
                        },
            },  

            { extend: 'print', footer: true, 
            className: 'green glyphicon glyphicon-print',
            text: 'Print',
            title: 'BRIGHT AQUA - Day to Day Delivery Tasks Report',
            orientation: 'landscape',
        exportOptions: {
        columns: [1,2,3,4,5,6],
         stripNewlines: false,
                        },
        
                    },

            { extend: 'copy', footer: true,
                orientation: 'landscape',
        exportOptions: {
        columns: [1,2,3,4,5,6],
         stripNewlines: false,
                        },
            },
        
        
        {
        text: 'PDF',
        extend: 'pdfHtml5',
        footer:true,
        download: 'open',
    message: '',
    orientation: 'landscape',
    exportOptions: {
        columns: [1,2,3,4,5,6],
         stripNewlines: false,
    },
        customize: function (doc) {
        doc.pageMargins = [10,10,10,10];
        doc.defaultStyle.fontSize = 9;
        doc.styles.tableHeader.fontSize = 9;
        doc.styles.title.fontSize = 10;
        // Remove spaces around page title
        doc.content[0].text = doc.content[0].text.trim();
        // Create a footer
        doc['footer']=(function(page, pages) {
            return {
                columns: [
                    'This is your left footer column',
                    {
                        // This is the right column
                        alignment: 'right',
                        text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                    }
                ],
                margin: [10, 0]
            }
        });
        // Styling the table: create style object
        var objLayout = {};
        // Horizontal line thickness
        objLayout['hLineWidth'] = function(i) { return .8; };
        // Horizontal line color
        objLayout['hLineColor'] = function(i) { return 'black'; };
        doc.content[1].layout = objLayout;
                }
            }
        //----------------------------------------
        ],

        

    } );  
} );


</script>

<!-- 
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> -->
<!-- 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script> -->


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

@endsection