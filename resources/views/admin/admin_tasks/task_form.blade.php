@extends('admin.root.master_page')

@section('form_layout_header_links')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
@endsection


@section('content')
<div class="container">

<div class="col-md-12">
    <div class="card" style="font-size:16px;   border: 2px solid rgb(132, 102, 214);">
        <div class="card-header">
            <div class="text-center">
           <h2 style="font-size:35px"><b>Task Asigning Form</b></h2>
           <h3>Order ID : <b><?php echo $get_order_id->id; ?></b></h3>
        </div>
    </div>
        <div class="card-body">

            <!--alert-->
            {{-- @if (session('status'))
            <div class="text-center">
              <div class="alert alert-success" role="alert">
                    {{ session('status') }}
              </div>
            </div>
            @endif --}}
            <!--alert-->

            <form  method="POST" id="task-form" class="task-form" action="/save_task_form" enctype="multipart/form-data" style="color:black">
                {{csrf_field()}}

               <input type="hidden" name="order_id" value="<?php echo $get_order_id->id; ?>">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Asign For :</label>
                        <select style="font-size:15px" class="form-control my-colorpicker1" name="asign_for" id="asign_for">
                            <option selected disabled>Select</option>
                            <option>Deliver person</option> 
                            <option disabled>Construction team</option>
                            <option disabled>Staff member</option>
                          </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Deliver person Email</label>
                        <select class="form-select" id="role_as" name="email">
                        <option selected disabled>Select</option>
                            @foreach($get_user_data as $value)
                                @if($value->role_as=="admin")
                                    @continue
                                @else

                                @endif
                                    @if($value->role_as == "deliver")
                                    <option value="{{$value->email}}">{{$value->email}} </option>
                                    @else
                                       @continue         
                                    @endif
                                    
                              @endforeach     
                                  </select> 
                    </div>
                </div>  

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Reason</label>
                        <select style="font-size:15px" class="form-control my-colorpicker1" name="reason" id="reason">
                            <option selected disabled>Select</option>
                            <option>Deliver goods</option>
                            <option disabled>Construction process for a pond</option>
                          </select>
                          <!-- <input type="text" class="form-control" name="reason" value="Deliver goods"> -->
                    </div>

                        <div class="mb-3 col-md-6">
                        <label class="form-label"  for="inputPassword4" style="font-size:16px">Task Duration:</label>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4" style="font-size:16px">From:</label>
                            <input type="date" name="from" class="form-control my-colorpicker1 from-val" id="from-val">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4" style="font-size:16px">To:</label>
                            <input type="date" name="to" id="to-val" class="form-control my-colorpicker1 to-val">
                        </div>
                        </div>
                   
                       
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                    <label class="form-label" for="exampleFormControlTextarea1"  style="font-size:16px">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="5"></textarea>

                    </div>
                    <div class="mb-3 col-md-12">
                   <input type="hidden" name="order_status" value="Sent to Deliver person">
                    </div>
                </div>


                <div class="row">

                    <div class="mb-3 col-md-6">
                        <a href="/cus_orders_list" type="submit" class="btn btn-secondary btn-block btn-lg">Back</a>
                    </div>

                    <div class="mb-3 col-md-6">

                        <button type="submit" class="btn btn-primary btn-block btn-lg pbtn">Save</button>
                    </div>
                </div>










            </form>
        </div>
    </div>
</div>
</div>
@endsection


@section('form_layout_links')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
<script src="js/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () { 
        $('.pbtn').click(function (e) {
           
            var get_from_val = document.getElementById("from-val").value;
            var get_to_val = document.getElementById("to-val").value;
                if(get_from_val == "" || get_to_val == ""){
                    e.preventDefault();
                    swal("Pls select a date", "");
                }
                else{
                    if(get_from_val < get_to_val){
                       form.submit();  
                    }else{
                        e.preventDefault();
                        swal("To field should be greater than From field", "");  
                    }
                }
        })
    });
    </script>

<script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#from-val').attr('min',today);
    </script>

<script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#to-val').attr('min',today);
    </script>

@endsection



<!-----------how to add a deleted at column-------->
<!-- php artisan make:migration add_deleted_at_column_to_task_asignings_table_ --table="task_asignings" -->