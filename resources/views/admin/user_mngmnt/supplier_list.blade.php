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
                <a href="/user_privileges" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>   
            <div class="card-header text-center">
                <span  style="font-size:24px;color:black;font-weight:bolder">Granting Supplier Accessibility</span>
 
            </div>
            <div class="card-body">
                       

  <!--ORDER DETAILS Modal-->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <div class="text-center">
        <h2 class="modal-title" id="exampleModalLabel" style="color:black"><b>Supplier Information</b></h2>
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
                            <th style="width:180px">Company Name</th>
                            <td id="company_name"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Supplier Name(Manager)</th>
                            <td id="name"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Email</th>
                            <td  id="email"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Contact No</th>
                            <td  id="contact_no"></td>
                            </tr>

                    
                            <tr>
                            <th style="width:180px">Address line 1</th>
                            <td id="address_line1"></td>
                            </tr>

                            <tr>
                            <th style="width:180px">Address line 2</th>
                            <td  id="address_line2"></td>
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
        
        
                <table id="user_roles" class="display table-striped table table-bordered border-primary">
                    <thead>
                        <tr>
            <th class="num" style="width:30px">ID</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Supplier info.</th>
            <th style="width:90px">Supplier Accessibility</th>
            <th style="width:120px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($users as $user)
                            @if($user->role_as == "supplier")
                                
                            @else
                            @continue
                            @endif
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->supplied_by}}</td>
                            <td style="width:90px">{{$user->email}}</td>
                            <td>
                            <div class="text-center">
                                <button  type="button" class="btn btn-primary detail-btn " data-bs-toggle="modal" data-bs-target="#myModal" data-id="{{$user->id}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                               </div> 
                            </td>
                            <td style="width:160px">
                                <form action="/update_supplier_status/{{$user->id}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <input type="hidden" name="id" id="id" value="{{$user->id}}">

                                    <div class="pull-right">
                        <div class="input-group">
                            <div class="form-outline">
                            <select class="form-select" id="supplier_accessibility" name="supplier_accessibility" style="width:110px">
                                    <option value="disabled" {{($user->supplier_accessibility === 'disabled') ? 'Selected' : ''}}>Disabled</option>
                                    <option value="activated" {{($user->supplier_accessibility === 'activated') ? 'Selected' : ''}}>Activated</option>
                                   
                                  </select>
                            </div>
                            
                          <button type="submit" class="btn btn-primary myBtn" style="height:31px" id="myBtn">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>
                        </div>
                        </div>
                        </form>
                            </td>

                            <td>
                           
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


<!--ORDER DETAILS MODAL SCRIPTS-->
<script>
    $('#myModal').modal('hide');

    $(document).ready(function(){
        $('.detail-btn').click(function(){
            const id =$(this).attr('data-id');
            //console.log(id);
            $.ajax({
                url: '/supplier_detail/'+id,
                type:'GET',
                data: {
                   "id" :id 
                },
                success:function(data){ 
                   // console.log(data);
                   $('#id').html(data.id);
                    $('#company_name').html(data.company_name);
                    $('#name').html(data.name);
                    $('#email').html(data.email);
                    $('#contact_no').html(data.contact_no);
                    $('#address_line1').html(data.address_line1);
                    $('#address_line2').html(data.address_line2);
                   

                }
            })
        });
    });
</script>
<!--ORDER DETAILS MODAL SCRIPTS-->
@endsection
