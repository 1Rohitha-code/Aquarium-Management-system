@extends('admin.root.master_page')

@section('title')
<title>View_ponds_list</title>
@endsection




@section('datatablestyle')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<link href="css/app.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
@endsection




@section('content')

    <div class="row">
    <div class="col-xl-16">
        <div class="card">

            <!--DELETE MODAL-->
  <!-- Modal -->
        <div class="modal fade" id="pond_delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleting Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="delete_pond_modal_form" method="POST">
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



            <div class=""><div class="text-center">
                <br>
                <span style="font-size:25px"><strong>Available ponds packages</strong></span>
              </div>
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
            <br />

              




            <div class="card-body">
                <div class="container">
                    <div class="box">

                        <table id="ponds_list" class="display table-striped table table-bordered border-primary">
                            <thead>
                                <div class="text-right">
                                    <a class="btn btn-success btn-lg button1" href="{{url('/ponds_adding_form')}}" role="button"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add New Pond package</a>
                                </div>
                                <br>
                                <tr>
                    <th class="num">ID</th>
                    <th class="image">Image</th>
                    <th>Required area</th>
                    <th style="width:30px">Depth</th>
                    <th style="width:25px">Dur.</th>
                    <th >Total cost(Rs)</th>
                    <th style="width:250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($display_ponds as $pond)
                                <tr>
                                    <td>{{$pond->id}}</td>
                                    <td><img src="{{asset('uploads/ponds/'.$pond->image)}}" width="100" height="70" alt="Image"></td>
                                    <td>{{$pond->required_area}}</td>
                                    <td>{{$pond->depth}}</td>
                                    <td>{{$pond->duration}}</td>
                                    <td>{{$pond->total_cost}}</td>

                                    <td>
                                    <a href="/pond_details/{{$pond->id}}" type="button" id="id" class="btn btn-info btn-lg" >Show</a>
                                    <a href="/edit_pond_profile/{{$pond->id}}" class="btn btn-primary btn-lg">Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-lg deletebtn">DELETE</a></td>



                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="num">ID</th>
                                    <th class="image">Image</th>
                                    <th>Required area</th>
                                    <th style="width:30px">Depth</th>
                                    <th style="width:25px">Dur.</th>
                                    <th >Total cost(Rs)</th>
                                    <th style="width:250px">Action</th>
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
          $('#ponds_list').DataTable();
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
      $('#ponds_list').DataTable();

        //query for deletion
        $('#ponds_list').on('click','.deletebtn',function(){
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            //console.log(data);

            $('#id').val(data[0]);

            $('#delete_pond_modal_form').attr('action','/delete_pond_profile/'+data[0]);

            $('#pond_delete_modal').modal('show');

        });

  } );
   </script>
<!--DELETE MODAL SCRIPTS-->


@endsection
