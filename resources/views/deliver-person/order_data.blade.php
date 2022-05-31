@extends('root.master_page')


@section('seemorepagestyles')

<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<link href="css/app.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="assets/css/feather.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/feather-icons"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
@endsection

@section('navbar')
@include('deliver-person.navbar')
@endsection


@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="panel panel-default">
            <div class="text-left">
                    <a href="/deliverer-dashboard" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
                    <div class="text-center">
                    <a href="/deliver_history" class="btn btn-success"><i class="fa fa-history" aria-hidden="true"></i>&nbsp; Deliver Task History</a>
                    </div>
                </div>
               
                <div class="text-center">
                <span style="font-size:36px"><u><b>Your Tasks</b></u></span> <span>
                </div>
                    <!--one message-->
                
            
    <!-------------------------------------------------------------------------->
  
  
              @foreach($task_data_with_delivery_info as $task)
                    @if($task->deleted_at != NULL)
                            @continue
                    @else

                    @endif

                        <div class="container"> 
                            <div class="card" style="border-color:black;">
                                <div class="card-body">
                                <div class="row">
                                        <div class="col">
                                        
                                    <b>Task ID :</b><span></span>&nbsp;&nbsp;&nbsp;&nbsp;{{$task->id}} <br>
                                    <b>Order ID :</b><span></span>&nbsp;&nbsp;&nbsp;&nbsp;{{$task->order_id}} <br>
                                    <b>Subject :</b><span style="font-size: 16px"></span>&nbsp;&nbsp;&nbsp;&nbsp; {{$task->reason}}<br>
                                    <b>Destination :</b><span style="font-size: 16px"></span>&nbsp;&nbsp;&nbsp;&nbsp; {{$task->city}}<br>
                                    <b>Task Duration: &nbsp;From :&nbsp; {{$task->from}}</b><span style="font-size: 16px"></span>&nbsp;
                                    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To:&nbsp; {{$task->to}}</b><span style="font-size: 16px"></span><br>
                                    <b>Description :</b><span style="font-size: 16px"></span>&nbsp;&nbsp;&nbsp;&nbsp; {{$task->description}}<br>
                                </div>
                                    <div class="col">
                                                                     
    <!--------------------------------------------------------------------------->                               
                       <a href="/see_more/{{$task->order_id}}" class="btn btn-secondary  btn-block" ><i class="fa fa-eye" aria-hidden="true"></i> &nbsp; Customer Information</a> <br>
   <!--------------------------------------------------------------------------------------->
                                    <br>
                                    <form action="/delivery_status/{{$task->order_id}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <select class="form-control my-colorpicker1" name="order_status" style="border-color: black;">
                                                <option value="Pending" {{($task->order_status === 'Pending') ? 'Selected' : ''}} Selected>Pending</option>
                                                <option value="Delivery process accepted" {{($task->order_status === 'Delivery process accepted') ? 'Selected' : ''}}>Delivery process accepted</option>
                                                <option value="Delivery process cancelled"{{($task->order_status === 'Delivery process cancelled') ? 'Selected' : ''}}>Delivery process cancelled</option>
                                                <option value="Handed over to the customer" {{($task->order_status === 'Handed over to the customer') ? 'Selected' : ''}}>Handed over to the customer</option> 
                                            </select>
                                            <button type="submit" class="btn btn-primary btn-block "><i class="fa fa-refresh" aria-hidden="true" ></i>&nbsp; Update Status</button>
                                          </form>
                                 
                                          <br>
                                          @if($task->order_status == "Handed over to the customer")
                                                <div class="text-center">   
                                                   <span style="color:black;font-size:16px" >Payment : LKR. {{$task->total_price}} /= </span>
                                            <a href="/soft_delete_task/{{$task->id}}" class="btn btn-danger btn-block pay_detail_btn"> <i class="fa fa-money" aria-hidden="true"></i>   &nbsp;&nbsp;Save Payment details</a>
                                                </div> 

                                          @else
                                            
                                          @endif
                                      
                                    <br>                                     
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>  
                
             @endforeach

   
       
            
    <!-------------------------------------------------------------------------->             
                </script>
              </div>
        </div>
      </div>
</div>

@endsection



@section('datatablescripts')


<script>
    $(document).ready(function() {
      $('#cus_order_deliv').DataTable();

     
  });
   </script>


<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!------------------------------------------>
<!--SWEET ALERT LINKS-->
<script src="js/sweetalert.min.js"></script>



<!--alert msg before soft deleting record-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.pay_detail_btn').on('click',function (e){
        e.preventDefault();
        var self = $(this);
        // alert('hi');
//----------------------------
        Swal.fire({
  title: 'Are you sure?',
  text: "This Action will disappear the task!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#3085d6',
  confirmButtonText: 'Yes, I have collected Money!'
}).then((result) => {
  if (result.isConfirmed) {
    
    location.href = self.attr('href');
  }
})
//---------------
    })
</script>
<!--alert msg before soft deleting record-->
@endsection
