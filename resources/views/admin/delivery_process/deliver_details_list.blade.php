<?php use Illuminate\Support\Facades\DB; ?>

@extends('admin.root.master_page')

@section('title')
<title>View_Deliver_details_list</title>
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
        <div class="card" style="width:60rem;">

        <div class="text-left">
            <a href="/cus_orders_list#" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
        </div>

            <div class="text-center">
                <span style="font-size:25px;color:black"><strong>Home deliver activities summary</strong></span>
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
              
              <!--alert-->


          <br>
            <div class="col">
                <div class="form-group">
                    <div class="text-right">
            <!-----------button-------------->
                    </div>
            </div>
            </div>





            <div class="card-body">
                <div class="container">
                    <div class="box">

                        <table id="deliver_details_list" style="color:black;">
                            <thead>
                                <tr>
                    <th style="width:10px">No.</th>
                    <th style="width:60px">Order Asigned to</th>
                    <th style="width:30px">No. of asigned by admin</th>
                    <th style="width:20px">No.of Completed by deliver</th>
                    <th style="width:10px">No.of Cancelled</th>
                    <th style="width:10px">No.of remainings to deliverer</th>
                    <th style="width:10px">No.of orders settled</th>
                    <th style="width:20px">Asigned order details</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=1;@endphp @foreach($no_of_asigned as $task) 
                                           
                                <tr>
                                    <td><?php echo $i;?> </td>
                                   
                                    <td>               
                                     {{$task->email}}
                                    </td>
                                    <td>
                                    <div class="text-center">
                                        {{$task->count}}
                                     
                                    </div>
                                    </td>
                                    <td>
                                    @foreach($no_of_cmpltd_by_deliver as $cmpltd)
                                    @if($task->email == $cmpltd->email)
                                       
                                            <div class="text-center">
                                            {{$cmpltd->count}}
                                            </div>
                                        @else
                                            @continue
                                        @endif       
                          
                                    @endforeach
                                    </td>
                                    <td>
                           
                           @foreach($cancelled_orders as $cancelled)
                              @if($task->email == $cancelled->email)
                              <div class="text-center">
                                      {{$cancelled->count}}  
                              </div>               
                               @else
                                  @continue
                              @endif             
                              @endforeach
                                      </td>
                                    <td>
                                        @foreach($no_of_remainings as $remaining)
                                            @if($task->email == $remaining->email)
                                            <div class="text-center">                    
                                                {{$remaining->count}}
                                            </div>
                                            @else
                                                @continue
                                            @endif                             
                                        @endforeach
                                    </td>
                                   
                                    <td>
                                        @foreach($no_of_cleared as $cleared)
                                                @if($task->email == $cleared->deliver_person)
                                                <div class="text-center">                    
                                                    {{$cleared->count}}
                                                </div>
                                                @else
                                                    @continue
                                                @endif 
                                        @endforeach
                                    </td>
                                    <td>
                                    <div class="text-center">
                                    <a href="/individual_delivery_profile/{{$task->email}}" class="btn btn-primary "><i data-feather="eye"></i></a>
                                    </div>
                                    </td>
                                </tr>
                              
                                @php    $i++ ; @endphp  @endforeach
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
          $('#deliver_details_list').DataTable();
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
      $('#deliver_details_list').DataTable();

        //query for deletion
        $('#deliver_details_list').on('click','.deletebtn',function(){
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



@endsection
