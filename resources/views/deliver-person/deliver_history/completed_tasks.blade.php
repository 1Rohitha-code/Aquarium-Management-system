@extends('root.master_page')

@section('title')
<title>Order list</title>
@endsection




@section('datatablestyle')
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
@include('deliver-person.navbar')
@endsection


@section('content')


    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <br>
            <div class="text-center">
                <span style="font-size:25px;font-color:black"><strong>Completed Tasks</strong></span>
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
                   
            </div>
            </div>


            <div class="card-body">
                <div class="container">
                    <div class="box">
                 
                    
                        <div class="text-right"> 
                  
                              <!---------------------search option---------------------------->
                                <span style="color:brown"><strong>Enter a date to Calculate Daily balance :</strong></span>
                            <form action="/search_completed_task_by_date" method="POST" role="search">
                            {{ csrf_field() }}
                                    <div class="pull-right">
                                    <div class="input-group">
                                        <div class="form-outline">
                                            <input type="date" name="query" id="form1"  placeholder="Ex : 2021-09-05..." style="height:35px" class="form-control"/>
                                            @error('query')
                                        <p style="color:red">{{$message}}</p>
                                             @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary " style="height:35px">
                                            <i class="fas fa-search" ></i>
                                        </button>
                                    </div>
                                    </div>
                                    </form>
                                    <br>

                                    <!---------------------search option---------------------------->
                     
                        </div><br>
                <table id="deliver_history" class="display table-striped table-bordered" style="width:850px;font-size:15px">
                    <thead>
                        <tr>
                            <th style="width:50px;height:40px"><div class="text-center">Task ID</div></th>
                            <th style="width:50px;height:40px"><div class="text-center">Order ID</div></th>
                            <th style="width:200px;height:40px"><div class="text-center">Delivered Date</div></th>
                            <th style="width:100px;height:40px"><div class="text-center">Destination </div></th>
                            <th style="width:100px;height:40px"><div class="text-center">Payment (LKR.)</div></th>
                            <th  style="width:100px;height:40px"><div class="text-center">Action</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- @php $total ="0" @endphp -->
                   
                        @php $total = "0" @endphp
                               
                                    @foreach($completed_task_details as $task)
                                    
                                            <tr>
                                            <td style="height:40px"><div class="text-center">{{$task->id}}</div></td>
                                            <td style="height:40px"><div class="text-center">{{$task->order_id}}</div></td>
                                            <td style="height:40px"><div class="text-center">{{$task->deleted_at}}</div></td>
                                            <td style="height:40px"><div class="text-center">{{$task->city}}</div></td>
                                            <td id="total_price" style="width:30px"><div class="text-center">{{$task->total_price}}</div></td>
                                            <td>
                                            <div class="text-center">                     
                                                <a href="" class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                            </div>
                                                </td>
                                            </tr>

                                            
                                            @php $total =   $total + ($task->total_price) 
                                            @endphp
                                        @endforeach
                           
      
                    </tbody>  
                    <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="height:40px"><b>
                              <div class="text-right">
                                  Total payment :
                              </div>
                          </b></td>
                          <td><b>                         
                         
                          LKR. {{ number_format($total, 2) }} /=
                           
                        </b></td>
                      </tr>
               </table>
              
                  
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>


    @endsection


    @section('datatablescripts')
   

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

<!--DELETE MODAL SCRIPTS-->



@endsection
