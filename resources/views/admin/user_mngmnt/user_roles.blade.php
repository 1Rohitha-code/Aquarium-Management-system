@extends('admin.root.master_page')

@section('title')
<title>User Roles</title>
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
@endsection


@section('content')


<div class="row">

    <div class="col-12 col-xl-12">
        <div class="card">
        <div class="text-left">
                <a href="/admin_dashboard" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp;Back</a>
            </div> 
            <div class="card-header text-center">
                <span  style="font-size:24px;color:black;font-weight:bolder">Assign User Roles</span>
                <div class="text-right">
                                        <a href="/supplier_list" class="btn btn-primary">Grant Supplier Accessibility</a>
                                    </div>
            </div>
            <div class="card-body">
                                 
                <table id="user_roles" class="display table-striped table table-bordered border-primary">
                    <thead>
                        <tr>
            <th class="num" style="width:30px">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th style="width:80px">User type</th>
            <th style="width:160px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($user_roles as $user)
                            @if($user->role_as == "supplier")
                                @continue
                            @else
                                
                            @endif
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <form action="/update_user_role/{{$user->id}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <input type="hidden" name="id" id="id" value="{{$user->id}}">

 
                                <select class="form-select" id="role_as" name="role_as">
                                    <option value=" " {{($user->role_as === ' ') ? 'Selected' : ''}} Selected>Customer</option>
                                    <option value="admin" {{($user->role_as === 'admin') ? 'Selected' : ''}}>Admin</option>
                                    <option value="deliver" {{($user->role_as === 'deliver') ? 'Selected' : ''}}>Deliver</option>
                                    <option value="staff" {{($user->role_as === 'staff') ? 'Selected' : ''}}>Staff</option>
                                    <option value="construct-member" {{($user->role_as === 'construct-member') ? 'Selected' : ''}}>Construct-member</option>
                                    <option value="supplier" {{($user->role_as === 'supplier') ? 'Selected' : ''}}>Supplier</option>
                                  </select>

                            </td>

                            <td>
                            <button type="submit" class="btn btn-primary btn-lg" ><i data-feather="refresh-ccw"></i></button>
                        </form>
                            <a href="javascript:void(0)" class="btn btn-danger btn-lg deletebtn"><i data-feather="trash-2"></i></a></td>

                             <!--DELETE MODAL-->
                <div class="modal fade" id="user_delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="delete_user_form" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                    <div class="modal-body">
                        <div class="text-center">

                <p style="font-size:28px">Are you sure? </p> <p style="font-size:18px">Once deleted, you will not be able to recover this data!</p>
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


                        </tr>

                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="num" style="width:30px">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width:80px">User type</th>
                            <th style="width:160px">Action</th>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection



    @section('datatablescripts')
    <script>
        $(document).ready(function() {
          $('#user_roles').DataTable();
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
      $('#user_roles').DataTable();


        $('#user_roles').on('click','.deletebtn',function(){
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();


            $('#id').val(data[0]);

            $('#delete_user_form').attr('action','/delete_user/'+data[0]);

            $('#user_delete_modal').modal('show');

        });

  } );
   </script>
<!--DELETE MODAL SCRIPTS-->


@endsection
