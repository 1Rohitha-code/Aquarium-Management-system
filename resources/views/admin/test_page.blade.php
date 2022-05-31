@extends('admin.root.master_page')

@section('title')
<title>View_Plant_list</title>
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
                <span style="font-size:25px;font-color:black"><strong>Tank Decorations Inventory</strong></span>
              </div>

         
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
            <a href="/decoration_data_form" class="btn btn-success btn-lg  button1"  role="button"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add New Decoration</a>
                    </div>
            </div>
            </div>


            <div class="card-body">
                <div class="container">
                    <div class="box">

                        <table id="decor_list" class="display table-striped table-bordered ">
                            <thead>
                                <tr>
                    <th >ID</th>
                    <th>Name</th>
                    <th style="width:30px">Unit Price(Rs)</th>
                    <th>Qty</th>
                    <th>Availability</th>
                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>
                                    <a href=" " class="btn btn-info "><i data-feather="eye"></i></a>
                                    <a href=" " class="btn btn-primary "><i data-feather="edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger  deletebtn"><i data-feather="trash-2"></i></a> </td>


                                </tr>
                           
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th >ID</th>
                                    <th>Name</th>
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
      $('#decor_list').DataTable();

        //query for deletion
        $('#decor_list').on('click','.deletebtn',function(){
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            //console.log(data);

            $('#id').val(data[0]);

            $('#delete_decor_modal_form').attr('action','/delete_decoration_profile/'+data[0]);

            $('#decor_delete_modal').modal('show');

        });

  } );
   </script>
<!--DELETE MODAL SCRIPTS-->



@endsection
