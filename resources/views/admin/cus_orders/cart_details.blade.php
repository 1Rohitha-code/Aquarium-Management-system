@extends('admin.root.master_page')

@section('title')
<title>View_Customer_Orders</title>
@endsection




@section('datatablestyle')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<script src="//code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<link href="css/app.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">



<link href="assets/css/feather.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/feather-icons"></script>
@endsection

@section('content')

    
<div class="row">
    <div class="col-md-12">
        <div class="card cus_order_list_card">
            <div class="text-center">
                <span style="font-size:28px;color:black"><b><u>Shopping cart</u></b></span>
              </div>
    
              <div class="card-body">
                <div class="container">
                <div class="pull-left">
                        <a href="/cus_orders_list" class="btn btn-secondary btn-lg"><i class="fa fa-step-backward" aria-hidden="true"></i> &nbsp; Back</a>
                        </div> <br> <br> 
                    <div class="box">
                         
                        <table id="cart_list" class="display table-striped table-bordered " style="color:black">
                            <thead>
                                <tr>
                    <th style="width:30px">Order ID</th>
                    <th style="width:30px">Product name</th>
                    <th style="width:10px">Unit price</th>
                    <th style="width:55px">Qty</th>
                    <th>Sub total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total="0"; @endphp
                          @foreach($cart_details as $item)
                                <tr class="get">
                                    <td class="order_id">
                                   {{$item->order_id}}
                                    </td>
                                    <td>
                                    {{$item->product_name}}
                                    </td>
                                    <td >
                                    {{ number_format($item->unit_price,2) }}
                                      
                                    </td>
                                    <td>
                                     {{$item->num_of_items}}
                                    </td>
                                    <td>
                                    @php 
                                    $subtotal = "0" @endphp
                                    @php
                                    $subtotal =   $subtotal + ($item->unit_price) * ($item->num_of_items) 
                                    @endphp
                                    <div class="text-left">
                                    <?php echo number_format($subtotal,2)  ;?>
                                    </div>    
                                </td> 
                                       <!--getting total -->
                                    @php $total = $total + ($item->unit_price) * ($item->num_of_items)  @endphp                     
                                </tr>
                              
                               
                                
                           @endforeach
                        </tbody>
                      
                            <tfoot>
                                <tr>
                    <th style="width:30px"></th>
                    <th style="width:300px"></th>
                    <th style="width:10px"></th>
                    <th style="width:55px">Total price </th>
                    <th> <?php echo "LKR : ".number_format($total,2); ?></th>
                                </tr>

                                </tfoot>
                        </table>
                        
                    </div>
                </div>

            </div>
        </>
    </div>
</div>




@endsection
@section('datatablescripts') 

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


<!--DELETE MODAL SCRIPTS-->
<script>
    $(document).ready(function() {
      $('#cart_list').DataTable();

     
  });
   </script>
<!--DELETE MODAL SCRIPTS-->



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

@endsection
