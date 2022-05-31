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
                <a href="/user_privileges" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>   
            <div class="card-header text-center">
                <span  style="font-size:24px;color:black;font-weight:bolder">Items to be Ordered From Suppliers </span>
                <div class="text-right">
            
            </div>
            </div>
            <div class="card-body">

            <!----------------------------------MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:450px">
					<div class="modal-content">
					<div class="modal-header">
						<span style="font-size:25px;">Order Items</span>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
							
							<div class="form-check">

								<form method="POST" action="/place_order">
									@csrf
									<div class="text-left">  
									<input style="text-align:left" type="radio" id="Already purchased suppliers" name="sup_category" class="form-check-input"  value="Already purchased suppliers">
									<label for="html" style="font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp;From Already purchased suppliers</label><br>

									&nbsp;&nbsp;<input style="text-align:left" type="radio" id="New suppliers" name="sup_category" class="form-check-input"  value="New suppliers">
									  <label  style="font-size: 17px;">From new Suppliers</label>
								</div>
							</div>
							</div>
			

					<div class="modal-footer">
						<div class="text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Continue </button>
					</form>
					</div>
					</div>
					</div>
				</div>
				</div>
		<!----------------------------------MODAL---------------------------------->

            <form method="post" action="/store_selected_val" id="supplier_cat_form" class="supplier_cat_form" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="pull-right">
                        <div class="input-group">
                            <div class="form-outline">
                            <select name="sup_category" id="sup_cat_val" class="form-select sup_cat_val" aria-label="Default select example" style="width:250px;height:30px">
                                <option selected disabled>Choose supplier category</option>
                                <option value="1"> New Suppliers</option>
                                <option value="2">Already Purchase Suppliers</option>
                                </select>
                            </div>
                         
                            <button  class="btn btn-primary continue-btn" style="height:30px;width:110px">Continue &nbsp;<i class="fa fa-step-forward" aria-hidden="true"></i></button>

                        </div>
                        </div>

                            
                   
                    <br><br>

            <table id="po_items" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width:30px">Product ID</th>
                    <th>Product name</th>
                    <th>Unit price</th>
                    <th>Available Qty</th>
                    <th>Select/Deselect all <br>
                    <div class="text-center">
                        <input type="checkbox" style="width:25px;height:20px" class="form-check-input" onClick="toggle(this)" />
                    </div>
                    </th>
                </tr>
                </thead>
                <tbody>

                 @foreach( $get_product_data as $value)
                 
                    <tr>
                        <td>
                        <div class="text-center">
                        {{$value->id}}
                        </div>
                        </td>
                        <td>
                        {{$value->product_name}}
                        </td>
                        <td>
                        {{$value->unit_price}}
                        </td>
                        <td>
                        <div class="text-center">
                        {{$value->quantity}}
                        </div>
                        </td>
                        <td>
                        <div class="text-center">
                            <input type="checkbox" style="width:25px;height:20px" class="form-check-input" name="product_ids[]" value="{{$value->id}}" id="checkbox">
                        </div>
                        </td>


                    </tr>
                     @endforeach
                    
                        </form>
                </tbody>
            </table>
          
           

            </div>
        </div>
    </div>

@endsection



    @section('datatablescripts')
<!----------------------------------------------------------->
<script src="js/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  



<!--------------------Validation for dropdown select and checkboxes---------------------->
<script>
    $(document).ready(function () { 
       $('.continue-btn').click(function (e) {
           //below variable is taken the selected value from supplier category dropdown
            var selected_value = $(this).closest(".supplier_cat_form").find('.sup_cat_val').val();
            if(selected_value == null){
                e.preventDefault();
                let form = $(this).parents('form');
                swal("Select a supplier category", "");
            }else{ 
                //if the selected value is not null then check whether the checkbox is null or not.
                e.preventDefault();
                let form = $(this).parents('form');
                var atLeastOneIsChecked = $('input[name="product_ids[]"]:checked').length > 0;
                $('#checkbox').is(':checked');  
                if(atLeastOneIsChecked == false){
                     swal("Pls check atleast one checkbox", "");
                }else{
                    form.submit();
                }       
            }
        })
    });       
    </script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!----------------------------------------------------------->

<!------------this code is used for select all check boxes at once------------------>
<script>
   function toggle(source) {
  checkboxes = document.getElementsByName('product_ids[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }

}
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
