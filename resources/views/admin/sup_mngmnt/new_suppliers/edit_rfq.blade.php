@extends('admin.root.master_page')

@section('title')
<title>Items to be ordered</title>
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

<!--------------------------------------------------->

        

<!--------------------------------------------------->
@endsection


@section('content')


<div class="row">

    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="text-right">
            <a href="/preview_of_rfq_info/{{$rfq_id}}" class="btn btn-success" style="width:200px">Proceed &nbsp;<i class="fa fa-step-forward" aria-hidden="true"></i></a>
            </div>   
  

            <div class="card-header text-center">
                <span  style="font-size:24px;color:black;font-weight:bolder">Edit RFQ information</span>
                <div class="text-right">
            
            </div>
            </div>
            <div class="card-body">
            <form method="post" id="form1" class="form1" action="/update_rfq_date_info/{{$rfq_id}}" class="rfq-qty-form" id="rfq-qty-form" enctype="multipart/form-data">
                            @csrf
                                                <div class="pull-right">
                                                   Response expected date : 
                                                   <div class="input-group">
                                                   <input type="date" id="responsive_date" class="form-control selected_date" style="width:200px" value="<?php foreach($edit_response_expected_date as $val){ echo $val->response_expected_date;}  ?>" name="response_expected_date">
                                                   <button type="submit" id="btn1" class="btn btn-secondary btn-lg btn1 btn-sm" > &nbsp;<i class="fa fa-refresh" aria-hidden="true"></i> </button>
                                                    </div>
                                                    </div>
                                                    <br>
                                                    <br><br>
                                                    <br>
 

                                                    <div class="card-body">


            <table id="update_rfq" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th style="width:20px">table id</th>
                    <th style="width:20px">Product ID</th>
                    <th>Product name</th>
                    <th>Product Category</th>
                    <th style="width:50px">Required Qty</th>
                   
                </tr>
                </thead>
                <tbody>
             @php $i=1 ; @endphp @foreach($edit_rfq_item_data as $value)
                    <tr>
                    <td>
                        <?php echo $i;?>
                      
                       </td>
                      
                       <td style="width:20px">
                       {{$value->id}}
                       </td>
                       <td style="width:20px">
                        {{$value->product_ids}}
                        <input type="hidden" name="product_ids[]" value="{{$value->product_ids}}">
                       </td>
                       <td>
                       {{$value->product_name}}
                       <input type="hidden" name="product_name[]" value="{{$value->product_name}}">
                   
                       </td>
                       <td>
                       {{$value->category_name}}
                       </td>
                       <td style="width:50px">
                       </form>
                        <div class="pull-center">
                       <form method="post" id="form2" class="form2" action="/update_rfq_item_qty/{{$value->id}}/{{$rfq_id}}" class="rfq-qty-form" id="rfq-qty-form" enctype="multipart/form-data">
                            @csrf
                       <input type="text" class="form-control Input" style="width:100px" name="required_qty" value="{{$value->required_qty}}" placeholder="Enter required qty" id="Input" required> 
                      <button type="submit" id="single-update"   class="btn btn-secondary btn-block btn-sm" style="width:100px"><i class="fa fa-refresh" aria-hidden="true"></i> </button></div></td>
                    </form> </div>
                    </td>
                    </tr>
            @php $i++ ;  @endphp  @endforeach
                </tbody>
             

            </table>
            <div class="text-right">
            <!-- <a href="/preview_of_rfq_info/{{$rfq_id}}" class="btn btn-success" style="width:200px">Proceed &nbsp;<i class="fa fa-step-forward" aria-hidden="true"></i></a> -->
            </div>
  
            </div>
        </div>
    </div>


@endsection



    @section('datatablescripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-----------------validation for input fields------------------>
<script>
    $(document).ready(function () { 
       $('.btn1').click(function (e) {

        var selected_date = document.getElementById('responsive_date').value;

            if(selected_date == ""){
                e.preventDefault();
                swal("Pls Select a date", "");
            }else{
                var current_date = "<?php echo date('Y-m-d', time()); ?>";
                    if(selected_date > current_date){
                    // e.preventDefault();
                    // alert(selected_date);
                  
                    //----------------------------------
                    form.submit();
                    
                    }else{
                        //if the selected date is lower than today, below code executes.
                        e.preventDefault();
                        swal("Please pick a date ahead", "today is "+current_date);
                    }
            }
           
           
           
        })
    });       
    </script>


          


<!-----------------validation for input fields------------------>
<script>
    $('.Input').keyup(function() {
    $('span.error-keyup-2').remove();
    var inputVal = $(this).val();
   // var characterReg = /^\s*[a-zA-Z,\s]+\s*$/;
    if(inputVal >=1000) {
        $(this).after('<span class="error error-keyup-2" style="color:red">Quantity should be less than 1000.Pls reduce the qty.</span>');
    }
});
    </script>

<!-----------------validation for input fields------------------>



    <script>
        $(document).ready(function() {
          $('#po_items').DataTable();
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



@endsection
