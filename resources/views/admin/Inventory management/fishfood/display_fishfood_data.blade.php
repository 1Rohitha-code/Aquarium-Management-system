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
                <span style="font-size:25px;font-color:black"><strong>Fishfood products Inventory</strong></span>
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
            <a href="/fishfood_data_form" class="btn btn-success btn-lg  button1"  role="button"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add New Fishfood Product</a>
                    </div>
            </div>
            </div>





            <div class="card-body">
                <div class="container">
                    <div class="box">

                        <table id="fishfood_list" class="display table-striped table-bordered ">
                            <thead>
                                <tr>
                    <th >ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th style="width:30px">Unit Price(Rs)</th>
                    <th>Qty</th>
                    <th>Availability</th>
                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fishfood_list  as $value)
                                <tr>
                                    <td>{{$value->product_id}}</td>
                                    <td>{{$value->product_name}}</td>
                                    <td>
                                        <img src="{{asset('uploads/product_imgs/'.$value->image)}}" width="100" height="70" alt="Image">
                                    </td>
                                    <td>{{$value->unit_price}}</td>
                                    <td>{{$value->quantity}}</td>
                                    <td>
                                    <?php
                                    if(($value->quantity) <=250 ){
                                    echo   '<span class="badge rounded-pill bg-danger"  style="font-size:12px" >Out of stock</span>';
                                    }else{
                                        echo '<span class="badge rounded-pill bg-primary"  style="font-size:13px" >In stock</span>';
                                    }
                                    ?>    
                                    </td>
                                    <td>
                                    <a href="/see_more_fishfood/{{$value->product_id}}" class="btn btn-info "><i data-feather="eye"></i></a>
                                    <a href="/edit_fishfood_data/{{$value->product_id}}" class="btn btn-primary "><i data-feather="edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger  deletebtn"><i data-feather="trash-2"></i></a> </td>


                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th >ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th style="width:30px">Unit Price(Rs)</th>
                                    <th>Qty</th>
                                    <th>Availability</th>
                                    <th>Action</th>
                                </tr>

                                </tfoot>
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
          $('#plant_list').DataTable();
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
      $('#fishfood_list').DataTable();

        //query for deletion
        $('#fishfood_list').on('click','.deletebtn',function(){
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
