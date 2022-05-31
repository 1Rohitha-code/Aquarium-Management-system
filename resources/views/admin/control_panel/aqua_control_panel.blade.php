
@section('datatablestyle')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<script src="//code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<link href="css/app.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="assets/css/feather.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/feather-icons"></script>

<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<!--ADMIN LTE LINKS-->
<link rel="stylesheet" href="{{asset('AdminLTElinks/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('AdminLTElinks/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTElinks/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!--ADMIN LTE LINKS-->
@endsection


@section('content')

				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
					

						
					</div>
					<div class="row">
						<div class="col-12 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
                     <!---------------------------------------------------->  
									<div class="col-sm-4">
   
									<a href="/cus_orders_list" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->	
									<span class="info-box-icon bg-green"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span  style="font-size:18px;"><b>Recieved Orders</b></span>
										<span class="info-box-number"><span style="font-size:20px;"><?php echo $get_no_of_orders; ?></span></span>
									</div>
									<!-- /.info-box-content -->
									</div>
								</a>

											<div class="info-box">
											<!-- Apply any bg-* class to to the icon to color it -->
											<span class="info-box-icon bg-gray"><i class="fa fa-envelope" aria-hidden="true"></i></span>
											<div class="info-box-content">
												<span style="font-size:18px;"><b>Invoices</b></span>
												<span class="info-box-number">2</span>
											</div>
											<!-- /.info-box-content -->
											</div>

											<div class="info-box">
											<!-- Apply any bg-* class to to the icon to color it -->
											<span class="info-box-icon bg-purple"><i class="fa fa-area-chart" aria-hidden="true"></i></span>
											<div class="info-box-content">
												<span style="font-size:18px;"><b>Daily profit</b></span>
												<span class="info-box-number">LKR.12000.00</span>
											</div>
											<!-- /.info-box-content -->
											</div>

									
                                      
									</div>
                   <!---------------------------------------------------->                
									<div class="col-sm-4">
										<a href="/delivery_details_list" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->
									<span class="info-box-icon bg-red"><i class="fa fa-hourglass-start" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span style="font-size:18px;"><b>Cancelled Orders</b><br><span style="font-size:13px;">by Deliver</span>
										<span class="info-box-number"><span style="font-size:20px;"><?php echo $no_of_cancelled; ?></span></span>
									</div>
									<!-- /.info-box-content -->
									</div>
									</a>


											<a href="/user_privileges" id="rec_orders">
											<div class="info-box">
											<!-- Apply any bg-* class to to the icon to color it -->
											<span class="info-box-icon bg-yellow"><i class="fa fa-users" aria-hidden="true"></i></span>
											<div class="info-box-content">
												<span style="font-size:18px;"><b>System users</b></span>
												<span class="info-box-number"  style="font-size:18px;"><?php echo $get_no_of_users; ?></span>
											</div>
											<!-- /.info-box-content -->
											</div>
											</a>

											<a href="/supplier_list" id="rec_orders">
											<div class="info-box">
											<!-- Apply any bg-* class to to the icon to color it -->
											<span class="info-box-icon bg-green"><i class="fa fa-address-card" aria-hidden="true"></i></span>
											<div class="info-box-content">
												<span style="font-size:18px;"><b>No. of active Suppliers</b></span>
												<span class="info-box-number" style="font-size:18px;"><?php echo $no_of_active_sup; ?></span>
											</div>
											<!-- /.info-box-content -->	
											</div></a>
									</div>

                                    <div class="col-sm-4">
									<a href="/cus_orders_list" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->
									<span class="info-box-icon bg-black"><i class="fa fa-tasks" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span style="font-size:18px;"><b>Orders to be asigned</b></span>
										<span class="info-box-number" style="font-size:18px;"><?php echo $no_of_tasks_to_be_asigned ; ?></span>
									</div>
									<!-- /.info-box-content -->
									</div>
									</a>

									

									<a href="/supplier_list" id="rec_orders">
											<div class="info-box">
											<!-- Apply any bg-* class to to the icon to color it -->
											<span class="info-box-icon bg-orange"><i class="fa fa-truck" aria-hidden="true"></i></span>
											<div class="info-box-content">
												<span style="font-size:18px;"><b>Supplier requests</b></span>
												<span class="info-box-number" style="font-size:18px;"><?php echo $no_of_sup_requests ; ?></span>
											</div>
											<!-- /.info-box-content -->
											</div>
											</a>

											<a href="" id="rec_orders">
											<div class="info-box">
											<!-- Apply any bg-* class to to the icon to color it -->
											<span class="info-box-icon bg-blue"><i class="fa fa-cubes" aria-hidden="true"></i></span>
											<div class="info-box-content">
												<span style="font-size:18px;"><b>Items to be ordered</b></span>
												<span class="info-box-number" style="font-size:18px;"><?php echo $items_to_be_ordered; ?></span>
											</div>
											<!-- /.info-box-content -->
											</div>
											</a>
										</div>

  <!----------------------------------------------------> 
									<div class="col-12 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row"> 
									<div class="col-sm-4">
   
									<a href="" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->	
									<span class="info-box-icon bg-green"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span  style="font-size:16px;"><b>Management Reports</b></span>
										<span class="info-box-number"><span style="font-size:20px;">2</span></span>
									</div>
									<!-- /.info-box-content -->
									</div>
									</a>
									
									<a href="" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->	
									<span class="info-box-icon bg-green"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span  style="font-size:16px;"><b>Quot. accepted</b></span>
										<span class="info-box-number"><span style="font-size:20px;">3</span></span>
									</div>
									<!-- /.info-box-content -->
									</div>
									</a>
									
									<a href="" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->	
									<span class="info-box-icon bg-green"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span  style="font-size:18px;"><b>RFQs accepted</b></span>
										<span class="info-box-number"><span style="font-size:20px;">5</span></span>
									</div>
									<!-- /.info-box-content -->
									</div>
									</a>
                       
									</div>              
									<div class="col-sm-4">
										<a href="" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->	
									<span class="info-box-icon bg-green"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span  style="font-size:16px;"><b>Cacelled Quotations</b></span>
										<span class="info-box-number"><span style="font-size:20px;">0</span></span>
									</div>
									<!-- /.info-box-content -->
									</div>
									</a>


										<a href="" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->	
									<span class="info-box-icon bg-green"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span  style="font-size:18px;"><b>Inventory items</b></span>
										<span class="info-box-number"><span style="font-size:18px;">541</span></span>
									</div>
									<!-- /.info-box-content -->
									</div>
									</a>

											<a href="" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->	
									<span class="info-box-icon bg-green"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span  style="font-size:18px;"><b>card8</b></span>
										<span class="info-box-number"><span style="font-size:18px;">5</span></span>
									</div>
									<!-- /.info-box-content -->
									</div>
									</a>
									</div>

                                    <div class="col-sm-4">
									<a href="" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->	
									<span class="info-box-icon bg-green"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span  style="font-size:16px;"><b>Completed Orders</b></span>
										<span class="info-box-number"><span style="font-size:18px;">2</span></span>
									</div>
									<!-- /.info-box-content -->
									</div>
									</a>

									

									<a href="" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->	
									<span class="info-box-icon bg-green"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span  style="font-size:16px;"><b>Deliver persons</b></span>
										<span class="info-box-number"><span style="font-size:18px;">04</span></span>
									</div>
									<!-- /.info-box-content -->
									</div>
									</a>

										<a href="" id="rec_orders">
									<div class="info-box">
									<!-- Apply any bg-* class to to the icon to color it -->	
									<span class="info-box-icon bg-green"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
									<div class="info-box-content">
										<span  style="font-size:18px;"><b>Card 9</b></span>
										<span class="info-box-number"><span style="font-size:20px;">XXXXX</span></span>
									</div>
									<!-- /.info-box-content -->
									</div>
									</a>
                                   
                   <!---------------------------------------------------->   
                   
                   
								</div>
							</div>
						</div>

					
					</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							
						</div>
				


						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<!-- <div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div> -->
						</div>
					</div>

				
				</div>
		


@endsection

@section('datatablescripts')
    <!-- <script>
        $(document).ready(function() {
          $('#plant_list').DataTable();
      } );
       </script> -->

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

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
<!-- <script>
    $(document).ready(function() {
      $('#decor_list').DataTable();

        //query for deletion
        $('#decor_list').on('click','.deletebtn',function(){
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            //console.log(data);

            $('#id').val(data[0]);

            $('#delete_decor_modal_form').attr('action','/delete_decoration_profile/'+data[0]);

            $('#decor_delete_modal').modal('show');

        });

  } );
   </script> -->
<!--DELETE MODAL SCRIPTS-->




</body>
<!--ADMIN LTE SCRIPTS-->
@endsection
