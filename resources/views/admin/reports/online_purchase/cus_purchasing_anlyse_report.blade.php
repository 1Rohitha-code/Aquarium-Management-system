

@extends('admin.root.master_page')

@section('title')
<title>BRIGHT AQUA - Analysing the tendency of category wise purchasing</title>
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
                <span  style="font-size:26px;color:black;"><u><b>BRIGHT AQUA - Analysing the tendency of category wise purchasing </b></u></span>
            </div>
     
            <div class="card-body">
            <table id="deliver_summary" class="table table-striped table-hover table-bordered user_roles" style="color:black;border:1px solid black">
                    <thead>
                        <tr> 
            <th style="width:10px">No.</th>            
            <th style="width:90px">Cus. Email</th>
            <th style="width:10px"> No.of times purchased from Medicines cat.</th>
            <th style="width:10px">No.of times purchased from Fish cat.</th>
            <th style="width:10px">No.of times purchased from Plant cat. </th>
            <th style="width:10px">No.of times purchased from Fishfood cat. </th>
            <th style="width:10px">No.of times purchased from Decorations cat.</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @php $total_medi_count = "0" @endphp
                    @php $total_fish_count = "0" @endphp
                    @php $total_plant_count = "0" @endphp
                    @php $total_fishfood_count = "0" @endphp
                    @php $total_decor_count = "0" @endphp
                    @php $i=1;@endphp 
                    @foreach($no_of_individual_purchases as $mainval)
                    <tr>
                    <td>
                           <div class="text-center">
                           <?php echo $i;?>
                           </div>
                       </td> 
                       <td>
                           <div class="text-left">
                           {{$mainval->email}}
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           @foreach($medi_cat_purchased_count as $medi)
                                @if($mainval->user_id == $medi->user_id)
                                    {{$medi->count}}     
                        @php 
                       $total_medi_count  =   $total_medi_count  + ($medi->count)      
                       @endphp  
                                @else
                                    @continue
                                @endif
                            @endforeach
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           @foreach($fish_cat_purchased_count as $fish)
                                @if($mainval->user_id == $fish->user_id)
                                    {{$fish->count}}     
                        @php 
                       $total_fish_count  =   $total_fish_count  + ($fish->count)      
                       @endphp  
                                @else
                                    @continue
                                @endif
                            @endforeach
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           @foreach($plant_cat_purchased_count as $plant)
                                @if($mainval->user_id == $plant->user_id)
                                    {{$plant->count}}     
                        @php 
                       $total_plant_count  =   $total_plant_count  + ($plant->count)      
                       @endphp  
                                @else
                                    @continue
                                @endif
                            @endforeach
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           @foreach($fishfood_cat_purchased_count as $fishfood)
                                @if($mainval->user_id == $fishfood->user_id)
                                    {{$fishfood->count}}  
                         @php 
                       $total_fishfood_count  =   $total_fishfood_count  + ($fishfood->count)      
                       @endphp    
                                @else
                                    @continue
                                @endif
                            @endforeach
                           </div>
                       </td> 
                       <td>
                           <div class="text-center">
                           @foreach($decor_cat_purchased_count as $decor)
                                @if($mainval->user_id == $decor->user_id)
                                    {{$decor->count}} 
                        @php 
                       $total_decor_count  =   $total_decor_count  + ($decor->count)      
                       @endphp      
                                @else
                                    @continue
                                @endif
                            @endforeach
                           </div>
                       </td> 
                      
                       @php    $i++ ; @endphp 
                        @endforeach
                 </tr>

                 <tr>
                      <td style="display:none;"><?php echo ($mainval->order_id)+100000;?> </td>
                    <td></td>
                    <td style="color:green;font-weight:bold;font-size:12px"><b>Total purchased count from Fish category</b></td>
                    <td>
                         <div class="text-center">
                     <span style="color:green;border-bottom: 3px double;border-top:1px solid green;">
                         <?php echo $total_fish_count ; ?>
                     </span>
                         </div>
                        </td>
                    <td></td>
                    <td></td>
                    <td></td>
             <td></td>
                 </tr>
                 <tr>
                 <td style="display:none;"><?php echo ($mainval->order_id)+100000;?> </td>
                    <td></td>
                    <td style="color:green;font-weight:bold;font-size:12px"><b>Total purchased count from Plants category</b></td>
                     <td>
                     <div class="text-center">
                     <span style="color:green;border-bottom: 3px double;border-top:1px solid green;">
                         <?php echo $total_plant_count ; ?>
                     </span>
                         </div>
                     </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                 </tr>
                 <tr>
                 <td style="display:none;"><?php echo ($mainval->order_id)+100000;?> </td>
                    <td></td>
                    <td style="color:green;font-weight:bold;font-size:12px"><b>Total purchased count from Fishfood category</b></td>
                     <td>
                     <div class="text-center">
                     <span style="color:green;border-bottom: 3px double;border-top:1px solid green;">
                         <?php echo $total_fishfood_count ; ?>
                     </span>
                         </div>
                     </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                 </tr>
                 <tr>
                 <td style="display:none;"><?php echo ($mainval->order_id)+100000;?> </td>
                    <td></td>
                    <td style="color:green;font-weight:bold;font-size:12px"><b>Total purchased count from Decoration category</b></td>
                     <td>
                     <div class="text-center">
                     <span style="color:green;border-bottom: 3px double;border-top:1px solid green;">
                         <?php echo $total_decor_count ; ?>
                     </span>
                         </div>
                     </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                 </tr>
                 <tr>
                    <td style="display:none;"><?php echo ($mainval->order_id)+100000;?> </td>
                    <td></td>
                    <td></td>
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
        columns: [1,2,3,4,5,6],
                        },
            },  

            { extend: 'print', footer: true, 
            className: 'green glyphicon glyphicon-print',
            text: 'Print',
            title: ' BRIGHT AQUA - Analysing Frequency of category wise purchasing',
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
    orientation: 'legal',
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