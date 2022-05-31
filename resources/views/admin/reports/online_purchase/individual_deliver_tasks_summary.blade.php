<?php

use App\Models\Delivery_Info;
use App\Models\Order_item;
use Dotenv\Loader\Value;
use Illuminate\Support\Facades\DB;?>

@extends('admin.root.master_page')

@section('title')
<title>BRIGHT AQUA -Delivery Tasks Report grouped by Deliverer</title>
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
                <span  style="font-size:26px;color:black;"><u><b>BRIGHT AQUA - Delivery Tasks Report grouped by Deliverer</b></u></span>
            </div>
     
            <div class="card-body">
            <div id = "pdf">
            <table id="deliver_summary" class="table table-striped table-hover table-bordered user_roles" style="color:black;border:1px solid black">
                    <thead>
                        <tr>
            <th style="width:10px">User ID</th>
            <th >Deliverer Name</th>
            <th >Deliverer Email</th>
            <th style="width:30px"><div class="text-center">No. of Orders Completed</div></th>
            <th style="width:30px"><div class="text-center">Total Collected Payments</div></th>
            <th style="width:30px">No. of Cities visited</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($get_deliverer as $mainval)
                    <tr>
                       <td>
                           <div class="text-center">
                                {{$mainval->id}}
                           </div>
                       </td>   
                       <td>
                           <div class="text-left">
                           {{$mainval->name}}
                           </div>
                       </td>
                       <td>
                           <div class="text-left">
                           {{$mainval->email}}
                           </div>
                       </td>
                       <td>
                           <div class="text-center">
                                @foreach($no_of_orders_completed as $cmpltd)
                                    @if($mainval->id == $cmpltd->id)
                                        {{$cmpltd->count}}
                                    @else
                                        @continue
                                    @endif
                                @endforeach
                           </div>
                       </td>
                       <td>
                           <div class="text-center">
                           @foreach($total_collected_payment as $pay)
                                    @if($mainval->id == $pay->id)
                                        {{$pay->ttl_collected}}
                                    @else
                                        @continue
                                    @endif
                                @endforeach
                           </div>
                       </td>
                       <td>
                           <div class="text-center">
                           @foreach($no_of_cities_visited as $city_count)
                                    @if($mainval->id == $city_count->id)
                                        {{$city_count->count}}
                                    @else
                                        @continue
                                    @endif
                                @endforeach 
                           </div>
                       </td>   
                    </tr>
                    @endforeach
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
    $('#deliver_summary').DataTable( {
        dom: 'Bfrtip',
        "bFilter": false,
        "bPaginate": false,
        "bInfo": false,
        buttons: [
    //-------------------------------
            { extend: 'excel', footer: true,
                title: 'BRIGHT AQUA - Delivery Tasks Report grouped by Deliverer'},
            { extend: 'print', footer: true,
                title: 'BRIGHT AQUA - Delivery Tasks Report grouped by Deliverer'
            },
            { extend: 'pdf', footer: true,
                title: 'BRIGHT AQUA - Delivery Tasks Report grouped by Deliverer',
                download: 'open'
            },
            { extend: 'copy', footer: true,
                title: 'BRIGHT AQUA - Delivery Tasks Report grouped by Deliverer'
            },

    //-------------------------
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