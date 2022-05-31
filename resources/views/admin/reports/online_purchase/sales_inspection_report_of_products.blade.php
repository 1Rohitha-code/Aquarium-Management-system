

@extends('admin.root.master_page')

@section('title')
<title>BRIGHT AQUA - Sales inspection Report</title>
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
                <span  style="font-size:26px;color:black;"><u><b>BRIGHT AQUA - Sales inspection Report</b></u></span>
            </div>
     
            <div class="card-body">
            <table id="sales_inspect" class="table table-striped table-hover table-bordered user_roles" style="color:black;border:1px solid black">
                    <thead>
                        <tr>
            <th style="width:10px">Product ID</th>
            <th style="width:90px">Product Name</th>
            <th style="width:10px">Unit price</th>
            <th style="width:10px">No.of Orders</th>
            <th style="width:10px">Average of Qty. added to cart</th>
            <th style="width:10px">Available Qty</th>
            <th style="width:10px">Supplier's Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products_sales as $product)
                    <tr>
                       <td>
                           <div class="text-center">
                           {{$product->id}}
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           {{$product->product_name}}
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           {{$product->unit_price}}
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           @foreach($no_of_purchases as $val)
                                @if($product->id == $val->product_id)
                                {{$val->id_count}}
                                @else
                                  @continue      
                                @endif
                           @endforeach
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           @foreach( $average_of_qty as $avg)
                           @if($product->id == $avg->product_id)
                                <?php echo round($avg->average); ?>
                                @else
                                  @continue      
                                @endif
                           @endforeach
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           {{$product->quantity}}
                           </div>
                       </td> 
                       <td>
                           <div class="text-left">
                           {{$product->supplied_by}}
                           </div>
                       </td> 
                 </tr>
                 @endforeach
                    </tbody>    
            </table>


                </div>
            </div>
        </div>


   
@endsection


    @section('datatablescripts')

    <script>
   $(document).ready(function() {
    $('#sales_inspect').DataTable( {
        dom: 'Bfrtip',
        "bFilter": false,
        "bPaginate": false,
        "bInfo": false,
        buttons: [
            
            
            { extend: 'excel', footer: true,
                orientation: 'landscape',
        exportOptions: {
        columns: [0,1,2,3,4,5,6],
                        },
            },  

            { extend: 'print', footer: true, 
            className: 'green glyphicon glyphicon-print',
            text: 'Print',
            title: 'BRIGHT AQUA -  Sales inspection Report',
            orientation: 'landscape',
        exportOptions: {
        columns: [0,1,2,3,4,5,6],
         stripNewlines: false,
                        },
        
                    },

            { extend: 'copy', footer: true,
                orientation: 'landscape',
        exportOptions: {
        columns: [0,1,2,3,4,5,6],
         stripNewlines: false,
                        },
            },
        
        
        {
        text: 'PDF',
        extend: 'pdfHtml5',
        footer:true,
        download: 'open',
    message: '',
    orientation: 'legal',
    exportOptions: {
        columns: [0,1,2,3,4,5,6],
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