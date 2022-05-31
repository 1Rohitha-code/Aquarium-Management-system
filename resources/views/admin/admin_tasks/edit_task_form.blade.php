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

           <div class="text-left">
           <h5>Task ID : <b><?php echo $edit_task_data->id; ?></b></h5>
           <h5>Order ID : <b><?php echo $edit_task_data->order_id; ?></b></h5>
           <h5><span style="color:red">Previously Task Asigned to:<b><?php echo $edit_task_data->email; ?> </span></b></h5>
           </div>

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

            <form  method="POST" action="/update_task_data/{{$edit_task_data->id}}" enctype="multipart/form-data" style="color:black">
                {{csrf_field()}}
                
                <input type="hidden" name="order_id" value="<?php echo $edit_task_data->order_id; ?>">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Asign For :</label>
                        <select style="font-size:15px" class="form-control my-colorpicker1" name="asign_for" id="asign_for">
                            <option value="Deliver person">Deliver person</option>
                          </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Email</label>
                        <select class="form-select"  name="email">
                        @foreach($get_user_data as $value)
                                @if($value->role_as=="deliver")
                                    @if($edit_task_data->email == $value->email)
                                        @continue
                                    @else
                                    <option value="{{$value->email}}" >{{$value->email}}</option>
                                    @endif
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
                            <option value="Deliver goods">Deliver goods</option>
                          </select>
                    </div>

                        <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Task Duration:</label>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4" style="font-size:16px">From:</label>
                            <input type="date" name="from" id="from" class="form-control  from" >
                                <div class="text-center">
                            <span style="color:black;background-color:orange;font-size:17px">{{$edit_task_data->from}}&nbsp;<i class="fa fa-times" aria-hidden="true"></i> </span>
                                </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4" style="font-size:16px">To:</label>
                            <input type="date" name="to" id="to" class="form-control  to">
                                <div class="text-center">
                                <span style="color:black;background-color:orange;font-size:17px">{{$edit_task_data->to}}&nbsp;<i class="fa fa-times" aria-hidden="true"></i> </span>
                                </div>
                        </div> 
                        </div>
                   
                       
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                       <input type="hidden" name="order_status" value="Sent to Deliver person">
                    </div>
                    <div class="mb-3 col-md-12">
                   
                    <label class="form-label" for="exampleFormControlTextarea1"  style="font-size:16px">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="5">
                    {{$edit_task_data->description}}
                    </textarea>

                    </div>
                </div>


                <div class="row">

                    <div class="mb-3 col-md-6">
                    <a href="#"  class="btn btn-secondary btn-block ">Back</a>
                   
                    </div>

                    <div class="mb-3 col-md-6">
                    <button type="submit" id="btn3" class="btn btn-primary btn-block btn3">Save</button>
                    </form>  <!-- <button type="submit" id="btn3" class="btn btn-primary btn-block btn-lg btn3">Save</button> -->
                    </div>
                </div>

            
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
        $('.btn3').click(function (e) {
           
            var get_from_val = document.getElementById("from").value;
            var get_to_val = document.getElementById("to").value;
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
        $('#from').attr('min',today);
    </script>

<script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#to').attr('min',today);
    </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
@endsection



