<?php

use App\Models\Delivery_Info;
use App\Models\Order_item;
use Dotenv\Loader\Value;
use Illuminate\Support\Facades\DB;?>

@extends('admin.root.master_page')

@section('title')
<title>BRIGHT AQUA -Analysing Profit of completed orders</title>
@endsection



@section('datatablestyle')

<script src="//code.jquery.com/jquery-3.5.1.js"></script>
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
                <span  style="font-size:26px;color:black;"><u><b>BRIGHT AQUA - Analysing Profit of completed orders</b></u></span>
            </div>
     
            <div class="card-body">
            <table id="deliver_summary" class="table table-striped table-hover table-bordered user_roles" style="color:black;border:1px solid black">
                    <thead>
                        <tr>
            <th style="width:10px">No.</th>  
            <th style="width:10px">Order ID</th> 
            <th style="width:110px">Cus. Email</th>
            <th style="width:10px">No.of Items per Order</th>
            <th style="width:10px">No.of cat. involved</th>
            <th style="width:80px;color:blue;font-weight:bolder">Order Total<br><span style="font-size:10px;"><b>(calculated with <u>sellable</u> price)</b></span></th>
            <th style="width:30px;color:green;font-weight:bolder">Order Total<br><span style="font-size:10px;"><b>(calculated with <u>original</u> price)</b></span></th>
            <th style="width:90px">Location</th>
            <th style="width:130px">Order Recieved Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $total = "0" @endphp
                    @php $ttl_pay_with_original_price = "0" @endphp
                    @php $i=1;@endphp 
                    @foreach($cus_order_details as $mainval)
                    <tr>
                    <td>
                           <div class="text-center">
                           <?php echo $i;?>
                           </div>
                       </td>
                       <td>
                           <div class="text-center">
                              {{$mainval->order_id}}
                           </div>
                       </td> 
                       <td>
                           <div class="text-left">
                           {{$mainval->email}}
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                              @foreach($no_of_items_per_order as $item)
                                    @if($mainval->order_id == $item->order_id)
                                        {{$item->items_per_order}}
                                    @else
                                       @continue     
                                    @endif
                              @endforeach
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           @foreach($no_of_cat_involved as $val)
                                    @if($mainval->order_id == $val->order_id)
                                        {{$val->no_of_cat_involved}}
                                    @else
                                       @continue     
                                    @endif
                              @endforeach
                           </div>
                       </td> 
                       <td style="color:blue;font-weight:bold">
                           <div class="text-center">
                           {{$mainval->order_total}}
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                              @foreach($payment_calculated_without_profit as $data)
                                    @if($mainval->order_id==$data->order_id)
                                        <span style="color:green;font-weight:bold">{{$data->tp_without_profit}}</span>
                                    @else
                                        @continue
                                    @endif
                              @endforeach
                           </div>
                       </td> 
                       <td>
                           <div class="text-left">
                           {{$mainval->city}}
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           {{$mainval->deleted_at}}
                           </div>
                       </td>   
                      
                    </tr>
                    @php $total =   $total + ($mainval->order_total) @endphp
                    @php  $ttl_pay_with_original_price =    $ttl_pay_with_original_price + ($data->tp_without_profit) @endphp  
                  
                    @php    $i++ ; @endphp 
                    @endforeach
                  <tr>
                    <td style="display:none;"><?php echo ($mainval->order_id)+100000;?>x </td>
                    <td></td>
                    <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td style="width:20px"></td>
                     <td></td>
                     <td></td>
              
                 </tr>
                 <tr>
                    <td style="display:none;"><?php echo ($mainval->order_id)+100000;?>x </td>
                    <td></td>
                    <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td style="width:80px;color:blue;font-weight:bolder">
                     Grand Total<br>
                     <span style="font-size: 10px;"><b>(calculated with sellable price)</b></span>
                    </td>
                     <td style="width:20px">
                     <div class="text-left">
                     <span style="color:blue;font-weight:bolder;border-bottom: 3px double;border-top:1px solid green;">
                     <b> =LKR. {{ number_format($total, 2) }}</b>
                     </span>
                         </div>
                     </td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                    <td style="display:none;"><?php echo ($mainval->order_id)+100000;?>x </td>
                    <td></td>
                    <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td style="width:80px;color:green;font-weight:bolder">
                         Grand Total<br>
                     <span style="font-size: 10px;"><b>(calculated with original price)</b></span>
                    </td>
                     <td style="width:20px">
                     <div class="text-left">
                     <span style="color:green;font-weight:bolder;border-bottom: 3px double;border-top:1px solid green;">
                     <b> =LKR. {{ number_format($ttl_pay_with_original_price, 2) }}</b>
                     </span>
                         </div>
                    </td>
                     <td ></td>
                     <td ></td>
           
                 </tr>
                 <tr>
                    <td style="display:none;"><?php echo ($mainval->order_id)+100000;?>x </td>
                    <td></td>
                    <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td style="width:80px;color:black;font-weight:bolder">
                         Profit
                     </td>
                     <td style="font-weight:bolder;width:20px">
                       <span style="font-size:9px;color:blue">  Grand Total(sellable price)</span> <span style="font-size: 10px;">-</span> <span style="font-size:9px;color:green">Grand total (original price) </span>
                     <br>
                     <div class="text-left">
                     <span style="color:green;">
                     <b>= {{ number_format($total, 2) }} - {{ number_format($ttl_pay_with_original_price, 2) }}</b>
                     <br>
                     <?php $profit = $total - $ttl_pay_with_original_price;?>
                     <div class="text-left">
                     <span style="color:green;border-bottom: 3px double;border-top:1px solid green;">
                     <b> =LKR.{{ number_format($profit, 2) }}/=</b>
                     </span>
                     </div>
                     </span>
                         </div>
                    </td>
                        <td></td>
                        <td ></td>

                     
                 </tr>
                    </tbody>    
            </table>


                </div>
            </div>
        </div>


   
@endsection


    @section('datatablescripts')

    <script>
   $(document).ready(function() {
    $('#deliver_summary').DataTable( {
        dom: 'Bfrtip',
        "bFilter": false,
        "bPaginate": false,
        "bInfo": false,
        buttons: [
            
            
            { extend: 'excel', footer: true,
                orientation: 'landscape',
        exportOptions: {
        columns: [1,2,3,4,5,6,7],
                        },
            },  

            { extend: 'print', footer: true, 
            className: 'green glyphicon glyphicon-print',
            text: 'Print',
            title: 'BRIGHT AQUA - Analysing Profit of completed orders',
            orientation: 'landscape',
        exportOptions: {
        columns: [1,2,3,4,5,6,7],
         stripNewlines: false,
                        },
        
                    },

            { extend: 'copy', footer: true,
                orientation: 'landscape',
        exportOptions: {
        columns: [1,2,3,4,5,6,7],
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
        columns: [1,2,3,4,5,6,7],
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

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

@endsection