@extends('root.master_page')

@section('title')
<title>Order list</title>
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

@section('navbar')
@include('normal-user-pages.navbar')
@endsection


@section('content')


    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <br>
            <div class="text-center">
                <span style="font-size:25px;font-color:black"><strong>Completed Orders</strong></span>
              </div>

                <!--DELETE MODAL-->
        <div class="modal fade" id="myorder_delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleting Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="myorder_modal_form" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                <div class="modal-body">
                    <div class="text-center">

                <p style="font-size:25px">Are you sure? </p> <p style="font-size:15px">Once deleted, you will not be able to recover this data!</p>
                        <input type="hidden" id="id">
            </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger " >Yes.Delete it.</button>
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
                    <div class="text-left">
                   <a href="" class="btn btn-secondary">Back</a>
                    </div>
            </div>
            </div>


            <div class="card-body">
                <div class="container">
                    <div class="box">

                <table id="myorder_list" class="display table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th style="width:10px">No</th>
                            <th style="width:20px">Order ID</th>
                            <th style="width:80px">Order Placed at</th>
                            <th style="width:80px">Order recieved at</th>
                            <th style="width:50px">Order Total (LKR.)</th>
                            <th style="width:30px">Payment Status</th>
                            <th style="width:20px">Order Details</th>
                        </tr>
                    </thead> 
                    <tbody>
                    @if($order_history->count()>0)
                    @php $i=1;@endphp @foreach($order_history as $value)
                            <tr>
                        <td><?php echo $i;?></td>
                            <td id="order_id">{{$value->id}}</td>
                            <td>{{$value->created_at}}</td>
                            <td>{{$value->to}}</td>
                            <td>{{$value->total_price}}</td>
                            <td>{{$value->payment_status}}</td>
                            <td>
                            <a href="/order_data/{{$value->id}}" class="btn btn-primary "><i data-feather="eye"></i></a>
                            </td>
                          
                        </tr> 
                      
                        
                        @php    $i++ ; @endphp 
                        @endforeach 
                    </tbody>  
                      
               </table>
              
               @else
                    <div class="text-center">
                            <span style="font-size:25px;color:red">You have not completed any orders yet.<a href="/normal_user" class="btn btn-info">Buy an Ornamental Fish</a></span>
                    </div>
                    @endif 
                  
                  
                  
              
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
          $('#myorder_list').DataTable();
      } );
       </script>

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!--SWEET ALERT LINKS-->
<script src="js/sweetalert.min.js"></script>


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

<script>
    $(document).ready(function() {
      $('#myorder_list').DataTable();  

  } );
   </script>


<!--DELETE MODAL SCRIPTS-->
<script>
    $(document).ready(function() {
      $('#myorder_list').DataTable();

        //query for deletion
        $('#myorder_list').on('click','.deletebtn',function(){
            $tr = $(this).closest('tr');

            var data = $tr.children("#order_id").map(function(){
                return $(this).text();
            }).get();
            //console.log(data); 

            $('#id').val(data[0]);

            $('#myorder_modal_form').attr('action','/delete_my_order/'+data[0]);

            $('#myorder_delete_modal').modal('show');

        });

  } );
   </script>
<!--DELETE MODAL SCRIPTS-->

@endsection
