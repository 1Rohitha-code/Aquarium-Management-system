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
            <div class="text-left">
                <a href="/back_to_previous_page" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>   
            <div class="text-right">
               <span style="font-size:16px;color:black;font-weight:bold"> No. of already purchased Suppliers : <?php echo count($already_purchased_sup_count) ;?> </span>
            </div>

            <div class="card-header text-center">
                <span  style="font-size:24px;color:black;font-weight:bolder">Information to be included to the Purchase Order</span>
                <div class="text-right">
            
            </div>
            </div>
            <div class="card-body">
            <form method="post" action="/store_required_po_info" class="rfq-qty-form" id="rfq-qty-form" enctype="multipart/form-data">
                            @csrf
                                                <div class="pull-left">
                                                   Response expected date :
                                                   <input name="response_expected_date" type="date" id="responsive_date" class="form-control selected_date" style="width:200px" >
                                                    </div>
                                                    <div class="pull-right">
                                                        Already purchase supplier <br>
                                                    <select name="supplier_comp_name" class="form-select" aria-label="Default select example">
                                                    <option selected>Select a supplier</option>
                                                    @foreach($already_purchased_sup_names as $val)
                                                    <option value="{{$val->supplied_by}}">{{$val->supplied_by}}</option>
                                                    @endforeach
                                                    </select>

                                                    </div>
                                                    <br>
                                                    <br><br>
                                                    <br>
 
            <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                    <th>Product ID</th>
                    <th>Product name</th>
                    <th>Product Category</th>
                    <th>Required Qty</th>
                   
                </tr>
                </thead>
                <tbody>
             @php $i=1 ; @endphp   @foreach($get_required_p_o_info as $value)
                    <tr>
                    <td>
                        <?php echo $i;?>
                      
                       </td>
                       <td>
                        {{$value->product_ids}}
                        <input type="hidden" name="product_ids[]" value="{{$value->product_ids}}">
                       </td>
                       <td>
                       <input type="hidden" name="product_name[]" value="{{$value->product_name}}">
                       {{$value->product_name}}
                       </td>
                       <td>
                       {{$value->category_name}}
                       </td>
                       <td>
                       <input type="text" class="form-control Input" name="required_qty[]" placeholder="Enter required qty" id="Input" required> 
                       </td>
                    </tr>
            @php $i++ ;  @endphp   @endforeach    
                </tbody>
             

            </table>
            <div class="text-right">
            <button type="submit" id="btn1" class="btn btn-primary btn-lg btn1" >Continue &nbsp;<i class="fa fa-step-forward" aria-hidden="true"></i></button>
            </div>
            </form>
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
    if(inputVal>1000) {
        $(this).after('<span class="error error-keyup-2" style="color:red">Quantity should be less than 1000.Pls reduce the qty.</span>');
    }
});
    </script>






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


<script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#responsive_date').attr('min',today);
    </script>



<!-----preventing page reload-------->
<script type="text/javascript">
    window.onbeforeunload = function() {
     
        return "Are you sure you want to leave?";
    }
</script>
@endsection
