
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


<div class="row">

    <div class="col-12 col-xl-12">
    <div class="text-left">
                <a href="/list_of_supplier_product_list" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div> 
        <div class="card">
            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">Edit product data</span>
            </div>

            
            <div class="card-body">
            @foreach($result as $val)
                <form action="/update_product_data/{{$val['id']}}/<?php echo $tableName; ?>" method="post">
                    @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">Product name</label>
                        <input type="text"  style="height:35px;color:black"  name="product_name" value="{{$val['product_name']}}" class="form-control my-colorpicker1">

                    </div>

                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Product category</label>
                    <select name="category_name" style="height:35px;color:black" class="form-select" id="inputGroupSelect01">
                        <option value="ornamentalfish" {{old('category_name',$val['category_name'])=="ornamentalfish"? 'selected':''}}>Ornamental fish</option>
                        <option value="decoration"   {{old('category_name',$val['category_name'])=="decoration"? 'selected':''}}>Decorations</option>
                        <option value="fishfood"  {{old('category_name',$val['category_name'])=="fishfood"? 'selected':''}}>Fishfood</option>
                        <option value="medicines"  {{old('category_name',$val['category_name'])=="medicines"? 'selected':''}}>Medicines</option>
                        <option value="plants"  {{old('category_name',$val['category_name'])=="plants"? 'selected':''}}>Plants</option>
                        </select>     
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Unit price</label>
                        <input type="text" name="unit_price" value="{{$val['unit_price']}}" class="form-control my-colorpicker1" placeholder="Rs.">
                    </div>
                  
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputEmail4" style="font-size:16px">Quantity</label>
                        <input type="text" name="quantity" value="{{$val['quantity']}}" class="form-control my-colorpicker1" placeholder="Name">
                    </div>
                </div>
          

                <div class="row">
                    <div class="mb-3 col-md-12">
                      
 <button type="submit" value="submit" class="btn btn-primary btn-block"> Update</button>
 </form>
 @endforeach
                    </div>

                    <div class="mb-3 col-md-6">
                       
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

@endsection
