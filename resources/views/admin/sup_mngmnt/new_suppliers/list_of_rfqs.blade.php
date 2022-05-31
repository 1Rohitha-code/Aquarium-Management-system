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
                <a href="/rfq_information" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>
    
      

            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">RFQ Details of Individual supplier</span>
            </div>

          
            
            <div class="card-body">

             <!--ORDER DETAILS Modal-->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <div class="text-center">
        <h2 class="modal-title" id="exampleModalLabel" style="color:black"><b>Delivery Information</b></h2>
          </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <!-- <h3 id="order_id"></h3> -->
 <!------------------------------------table area----------------------------------------->
                        <table class="table table-hover table-bordered" style="color:black;font-size:14px">
                        <thead>
                            
                        </thead>
                      
                        <tbody>
                            <tr>
                            <th style="width:180px">User ID</th>
                            <td id="id"></td>
                            </tr>   

                            <tr>
                            <th style="width:180px">Supplier Name</th>
                            <td id="name"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Supplier email</th>
                            <td id="email"></td>
                            </tr>

                           

                            <tr>
                            <th style="width:180px">Supplier address</th>
                            <td id="address_line1"></td>
                            </tr>

                            <tr>
                            <th style="width:180px"></th>
                            <td id="address_line2"></td>
                            </tr>
                            <tr>
                            <th style="width:180px">Contact no.</th>
                            <td id="contact_no"></td>
                            </tr>
 
                        </tbody>
                        </table>

 <!------------------------------------table area----------------------------------------->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <!--ORDER DETAILS Modal-->


              <table id="rfq_list" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th style="width:30px">No</th>
                    <th style="width:30px">RFQ Ref. ID</th>
                    <th style="width:50px">Company Name</th>
                    <th style="width:50px">RFQ Delivered at</th>    
                    <th style="width:50px">Status</th> 
                    <th style="width:30px">Supplier info</th> 
                    <th style="width:50px">RFQ Letter</th>  
                    <th style="width:70px">Quotation</th>  
                 
                </tr>
                </thead>
                <tbody>
             @php $i=1 ; @endphp @foreach($supplier_data as $val)
             <tr>
                    <td>
                        <?php echo $i;?>  
                       </td>
                       <td>
                        {{$val->rfq_no}}
                       </td>
                       <td>
                       {{$val->supplied_by}}
                        </td>
                       <td>
                       {{$val->date_of_delivered}}
                       </td>
                       <td>
                       {{$val->rfq_status}}
                       </td>
                       <td>
                       <div class="text-center">
                                <button  type="button" class="btn btn-primary detail-btn " data-bs-toggle="modal" data-bs-target="#myModal" data-id="{{$val->user_id}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                               </div> 
                       </td>
                       <td>
                       <div class="text-center">
                        <a href="/rfq_PDF/{{$val->user_id}}/{{$val->rfq_no}}" class="btn btn-danger "><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                   
                        </div>
                       </td>
                    
                       <td style="width:70px">
                            @if($val->rfq_status == "quotation sent from supplier")
                              <a href="/quotation_page/{{$val->user_id}}/{{$val->rfq_no}}" class="btn btn-primary"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
                            @else
                            <a href="#" class="btn btn-primary"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                            @endif
                       </td>
                      
                    </tr>
            @php $i++ ; @endphp @endforeach
                </tbody>        
            </table>
          
             
            </div>
        </div>
    </div>

@endsection



    @section('datatablescripts')
<!----------------------------------------------------------->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!----------------------------------------------------------->

<!------------this code is used for select all check boxes at once------------------>



    <script>
        $(document).ready(function() {
          $('#rfq_list').DataTable();
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



<!--ORDER DETAILS MODAL SCRIPTS-->
<script>
    $('#myModal').modal('hide');

    $(document).ready(function(){
        $('.detail-btn').click(function(){
            const id =$(this).attr('data-id');
            //console.log(id);
            $.ajax({
                url: '/supplier_details/'+id,
                type:'GET',
                data: {
                   "id" :id 
                },
                success:function(data){ 
                     console.log(data);
                  $('#id').html(data.id);
                  $('#name').html(data.name);
                     $('#email').html(data.email);
                    $('#date_of_delivered').html(data.date_of_delivered);
                    $('#date_of_accepted').html(data.date_of_accepted);
                    $('#response_expected_date').html(data.response_expected_date);
                    $('#address_line1').html(data.address_line1);
                    $('#address_line2').html(data.address_line2);
                    $('#contact_no').html(data.contact_no);
                  

                }
            })
        });
    });
</script>
<!--ORDER DETAILS MODAL SCRIPTS-->
@endsection
