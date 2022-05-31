@extends('admin.root.master_page')

@section('title')
<title>View_Deliver_details_list</title>
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




@section('content')


    <div class="row">
    <div class="col-md-12">
        <div class="card">

        <div class="text-left">
            <a href="/individual_delivery_profile/<?php echo $email;?>" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
        </div>

            <div class="text-center">
                <span style="font-size:25px;color:black"><strong>Filtered Result by date</strong></span>
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
                    <div class="text-right"> 
                  
                 
         
            </div><br>
            <form action="/save_completed_orders_by_date" method="post" style="border:1px solid black;background-color:rgb(255, 239, 181)">
            {{csrf_field()}}
            <table id="deliver_history" class="table-striped table-bordered" style="width:850px;font-size:13px;color:black;border-color:black;color:black">
                    <thead>
                        <tr>
                            <th style="width:50px"><div class="text-center">Order ID</div></th>
                            <th style="width:160px"><div class="text-center">Task Duration</div></th>
                            <th style="width:200px"><div class="text-center">Order Status</div></th>
                            <th  style="width:120px"><div class="text-center">Date of handed over</div></th>
                            <th  style="width:150px"><div class="text-center">Payment (LKR.)</div></th>
                            <th  style="width:130px"><div class="text-center">Payment Status</div></th>
                           
                        </tr> 
                    </thead>
                    <tbody>
                        <!------------------------------------------------------>
                        @php $total = "0" @endphp
                @foreach($completed_order_data as $order)   
        
                           <input type="text" name="order_id[]" value="{{$order->order_id}}" id="order_id" style="visibility:hidden">
                           <input type="text" name="order_completed_date[]" value="{{$order->deleted_at}}" id="order_completed_date" style="visibility:hidden">
                           <input type="text" name="order_total[]" value="{{$order->total_price}}" id="order_total" style="visibility:hidden">
                           <input type="text" name="deliver_person[]" value="<?php echo $email;?>" id="deliver_person" style="visibility:hidden">
                            
                        <!------------------------------------------------------>
                   
                <tr>       
                        <td>
                            <div class="text-center">
                                {{$order->order_id}}
                            </div>
                        </td>
                        <td >
                            <div class="text-center"> 
                            <b>From : </b>{{$order->from}} <br>
                            <b>To : </b>{{$order->to}}
                            </div>
                        </td>
                        <td >
                            <div class="text-center"> 
                            {{$order->order_status}}
                            </div>
                        </td>
                        <td >
                                <div class="text-center">
                                  {{$order->deleted_at}}    
                                </div>       
                        </td>
                        
                        <td >
                            <div class="text-center"> 
                            @if($order->order_status == "Delivery process cancelled")
                            <span style="color:red">{{$order->total_price}}</span>   
                            @else
                                <span style="color:green">{{$order->total_price}}</span>
                            @endif
                            </div>
                            </td>
                                          
                        <td >
                            @if($order->payment_status != NULL)
                            <div class="text-center">
                            {{$order->payment_status}}&nbsp; <i class="fa fa-check" aria-hidden="true"></i> 
                            </div>  
                            @else
                            <div class="text-center">
                                <span>Not done&nbsp;<i class="fa fa-times" aria-hidden="true"></i></span>
                            </div>
                                @endif
                                
                        </td>   
                      
                                     
                           </tr>
                           @if($order->order_status == "Delivery process cancelled")
                             @continue
                           @else
                                    @if($order->payment_status == "Done")
                                        <?php $order->total_price; ?>
                                    @else
                                        @continue   
                                    @endif
                                  
                           @endif

                           @php $total =   $total + ($order->total_price) 
                                            @endphp
                    @endforeach
                    </tbody>  
                    
                    <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="height:40px"><b>
                              <div class="text-center">
                                  Total payment :
                              </div>
                          </b></td>
                          <td><b>                         
                         
                          LKR.  <span style="color:green;border-bottom: 3px double;"> {{ number_format($total, 2) }} /= </span>
                           
                        </b></td>
                          <td></td>

                      </tr>
             
               </table> 
               <br>
               <div class="text-right">
            <button class="btn btn-secondary cmpltd" id="cmpltd" type="submit" >SAVE COMPLETED ORDERS</button>
                    </div>
                     </form>

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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<script>
$(document).on("click","#cmpltd",function(e) {
    e.preventDefault();
    let form = $(this).parents('form');
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Save the records!'
}).then((result) => {
  if (result.isConfirmed) {
            form.submit();

     }
    })
});
</script>

@endsection
