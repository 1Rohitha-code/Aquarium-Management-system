<?php
use Illuminate\Support\Facades\Auth;
?>
@extends('root.master_page')

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
@endsection

@section('navbar')
@include('supplier.navbar')
@endsection



@section('content')
<body onload='document.form1.text1.focus()'>

<div class="row">

    <div class="col-12 col-xl-12">
    <div class="text-left">
                <a href="##" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div> 
        <div class="card">
            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">Create a Table to store your item details</span>
            </div>

            
            <div class="card-body">
         
            <form action="/store_form_data" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Table name</label>
                        <span style="color:red;font-size:15px"><br>pls put an underscore between two words of your table name.</span>
                        <input type="text" name="table_name" id="table_name" class="form-control my-colorpicker1 table_name" placeholder="Ex: CompanyName_Aquarium">
                    </div>
                    <div class="mb-3 col-md-6">
 
                    </div>
                </div>

        <input type="hidden" name="unique_col_name" value="<?php echo Auth::user()->name; ?>" class="form-control">

               
            
            <button type="submit" class="btn btn-primary sup_btn" >Continue</button>
            </form>
          
             
            </div>
            </div>
        </div>
    </div>
    
</body>
@endsection



    
@section('datatablescripts')
   

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

<script>
    @if (session('table_exists'))
swal({
  title: '{{session('table_exists')}}',
  icon: 'error',
  button: "OK",
});
@endif
</script>
<!--SWEET ALERT LINKS-->
<script>
        $(document).ready(function() {
          $('#rfq_list').DataTable();
      } );
       </script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-----------------validation for input fields------------------>
<script>
    $(document).ready(function () { 
       $('.sup_btn').click(function (e) {
 
        var selected_date = document.getElementById('table_name').value;

            if(selected_date == ""){
                e.preventDefault();
                swal("Pls give a table name", "");
            }else{
               
                  form.submit();
                 
            }
           
           
           
        })
    });       
    </script>


@endsection
