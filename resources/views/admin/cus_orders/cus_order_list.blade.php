<?php

use App\Models\Delivery_Info;
use App\Models\Order_item;
use Dotenv\Loader\Value;
use Illuminate\Support\Facades\DB;?>

@extends('admin.root.master_page')

@section('title')
<title>View_Fishfood_list</title>
@endsection




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




@section('content')


    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="text-center">
                <span style="font-size:28px;color:black"><b><u>Recieved Orders</u></b></span>
              </div>

             

            <!--DELETE MODAL-->
  <!-- Modal -->
        <div class="modal fade" id="fishfood_delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleting Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="delete_fishfood_modal_form" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                <div class="modal-body">
                    <div class="text-center">

                <p style="font-size:25px">Are you sure? </p> <p style="font-size:15px">Once deleted, you will not be able to recover this data!</p>
                        <input type="hidden" id="id">
            </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger btn-lg" >Yes.Delete it.</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        <!--DELETE MODAL-->





                <!--alert-->
                {{-- @if (session('status'))
                <div class="text-center">
                <h4><div class="alert alert-success" role="alert">
                      {{ session('status') }}
                </div></h4>
                </div>
              @endif --}}
              <!--alert-->


          <br>
            <div class="col">
                <div class="form-group">
                <div class="text-right">
              <a href="/delivery_details_list" class="btn btn-success" style="color:white;font-size:16px">Delivery details</a> 
                <a href="#" class="btn btn-success" style="color:white;font-size:16px">Payment details</a>
                &nbsp;&nbsp;&nbsp;&nbsp;</div> 
            </div>
            </div>

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
                            <th style="width:180px">Order ID</th>
                            <td id="order_id"></td>
                            </tr>   

                            <tr>
                            <th style="width:180px">First Name</th>
                            <td id="first_name"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Last Name</th>
                            <td id="last_name"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Phone</th>
                            <td  id="phone_no"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Alternate No</th>
                            <td  id="alternate_no"></td>
                            </tr>

                    
                            <tr>
                            <th style="width:180px">Address line 1</th>
                            <td id="address_line1"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Address line 2</th>
                            <td  id="address_line2"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Location</th>
                            <td id="location"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">City</th>
                            <td id="city"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Delivery Charges (LKR.)</th>
                            <td id="delivery_cost"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Email</th>
                            <td  id="email"></td>
                            </tr>

                            <tr>
                            <th style="width:180px"> Order Total (LKR.)</th>
                            <td id="total_price"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Order Placed at</th>
                            <td  id="order_placed_date"></td>
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



            <div class="card-body" >
                <div class="container">
                    <div class="box">

                    <table id="order_list" class="display table-striped table-bordered " style="color:black;width:880px">
                            <thead>
                                <tr>
                    <th style="width:15px">No.</th>                 
                    <th style="width:15px">Order ID</th>
                    <th style="width:50px">Cus.Email</th>
                    <th style="width:55px">Order placed at</th>
                    <th class="text-center" style="width:10px">Customer info.</th>
                    <th class="text-center" style="width:20px">Order file</th>
                    <th style="width:390px">Order Status</th>
                    <th><div class="text-center" style="width:60px">Process</div></th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=1;@endphp  @foreach($delivery_info as $value) 
                                    @if($value->order_status =='Handed over to the customer')
                                        @continue
                                    @else

                                    @endif
                                <tr>
                                    <td>
                                    <?php echo $i;?>
                                    </td>
                                    <td>
                                    {{$value->id}}
                                    </td>
                                    <td>
                                    {{$value->email}}
                                    </td>
                                    <td> 
                                    {{$value->created_at}}
                                    </td>
                                    <td>
                                    <div class="text-center">
                                <button  type="button" class="btn btn-primary detail-btn " data-bs-toggle="modal" data-bs-target="#myModal" data-id="{{$value->id}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                               </div> 
                                    </td>
                                    <td>
                                    <div class="text-center">
                        <a href="{{action('Admin_Dashboard\Single_OrderController@downloadPDF', $value->id)}}" class="btn btn-danger "><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                </div>
                                    </td>
                                    <td>
                                    <form action="/update_order_state/{{$value->id}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <input type="hidden" name="id" id="id" value="{{$value->id}}">
                        <select class="form-select" id="order_status" name="order_status">
                                    <option value="Pending" {{($value->order_status === 'Pending') ? 'Selected' : ''}} Selected>Pending</option>
                                    <option value="Order Completed" {{($value->order_status === 'Order Completed') ? 'Selected' : ''}}>Order Completed</option>
                                    <option value="Sent to Deliver person" {{($value->order_status === 'Sent to Deliver person') ? 'Selected' : ''}}>Sent to Deliver person</option>
                                    <option value="Delivery process accepted" {{($value->order_status === 'Delivery process accepted') ? 'Selected' : ''}}>Delivery process accepted</option>
                                     <option value="Delivery process cancelled"{{($value->order_status === 'Delivery process cancelled') ? 'Selected' : ''}}>Delivery process cancelled</option>
                                    <option value="Handed over to the customer" {{($value->order_status === 'Handed over to the customer') ? 'Selected' : ''}}>Handed over to the customer</option> 
                                    <option value="Sent to Constructor" {{($value->order_status === 'Sent to Constructor') ? 'Selected' : ''}}>Sent to Constructor</option>
                                    <option value="Constructor accepted" {{($value->order_status === 'Constructor accepted') ? 'Selected' : ''}}>Constructor accepted</option>
                                    <option value="Sent to Staff member" {{($value->order_status === 'Sent to Staff member') ? 'Selected' : ''}}>Sent to Staff member</option>
                                    <option value="Staff member accepted" {{($value->order_status === 'Staff member accepted') ? 'Selected' : ''}}>Staff member accepted</option>
                        </select>
                            <div class="text-center">
                             <button type="submit" class="btn btn-primary btn-sm btn-block" ><i class="fa fa-refresh" aria-hidden="true"></i></button>
                            </div>
                    </form>
                                    </td>
                                    <td>
                                    <div class="text-center">
                                        @if($value->order_status == "Sent to Deliver person")
                                        <button class="btn btn-secondary" style="background-color:dark" disabled><i class="fa fa-play" aria-hidden="true"></i>&nbsp; </button>
                                        @else
                                        <a href="/goto_task_form/{{$value->id}}" class="btn btn-success" style="background-color:dark"><i class="fa fa-play" aria-hidden="true"></i>&nbsp; </a>
                                        @endif
                   
                       
                        </div>
                                    </td>
                                </tr>
                                @php    $i++ ; @endphp 
                          @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


    @endsection


    @section('datatablescripts')
    <script>
        $(document).ready(function() {
          $('#order_list').DataTable();
      } );
       </script>

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

<!--DELETE MODAL SCRIPTS-->
<script>
    $(document).ready(function() {
      $('#order_list').DataTable();

        //query for deletion
        $('#order_list').on('click','.deletebtn',function(){
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            //console.log(data);

            $('#id').val(data[0]);

            $('#delete_fishfood_modal_form').attr('action','/delete_fishfood_profile/'+data[0]);

            $('#fishfood_delete_modal').modal('show');

        });

  } );
   </script>
<!--DELETE MODAL SCRIPTS-->


<!--ORDER DETAILS MODAL SCRIPTS-->
<script>
    $('#myModal').modal('hide');

    $(document).ready(function(){
        $('.detail-btn').click(function(){
            const id =$(this).attr('data-id');
            //console.log(id);
            $.ajax({
                url: 'order_detail/'+id,
                type:'GET',
                data: {
                   "id" :id 
                },
                success:function(data){ 
                   // console.log(data);
                   $('#order_id').html(data.id);
                    $('#first_name').html(data.first_name);
                    $('#last_name').html(data.last_name);
                    $('#phone_no').html(data.phone_no);
                    $('#alternate_no').html(data.alternate_no);
                    $('#address_line1').html(data.address_line1);
                    $('#address_line2').html(data.address_line2);
                    $('#location').html(data.location);
                    $('#city').html(data.city);
                    $('#delivery_cost').html(data.delivery_cost);
                    $('#email').html(data.email);
                    $('#total_price').html(data.total_price);
                    $('#order_placed_date').html(data.created_at);

                }
            })
        });
    });
</script>
<!--ORDER DETAILS MODAL SCRIPTS-->


@endsection
