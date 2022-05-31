
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


          
            
        

<!--------------------------------------------------------------->
    <div class="row">
        <div class="mb-4 col-md-12">
        <div class="card" >
            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">Item store</span>
             
            </div>
            <div class="card-body">
            <div class="text-right">
                 <a href="/product_data_insertion_form/<?php echo $supplier_table_name; ?>" class="btn btn-primary">Add Product</a>
                </div><br>
            <table id="item_store" class="table table-bordered table-striped">
              <thead>
              <tr>
              <th>No</th>
                <th>Product name</th>
                <th>Image</th>
                <th>Category name</th>
                <th>Unit price</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @php $i=1; @endphp @foreach($result as $data)
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $data['product_name']; ?></td>
                  <td>
                  <img src="{{asset('uploads/supplier_imgs/'.$data['image'])}}" width="100" height="70" alt="Image">
                  </td>
                  <td><?php echo $data['category_name']; ?></td>
                  <td><?php echo $data['unit_price']; ?></td>
                  <td><?php echo $data['quantity']; ?></td>
                  <td>
                  <div class="pull-center">
                
                <a href="/edit_product_data/{{$data['id']}}/<?php echo $supplier_table_name; ?>"  class="btn btn-secondary btn-sm"><i class="fa fa-pencil-square"  aria-hidden="true"></i></a>
                <a href="/delete_record/{{$data['id']}}/<?php echo $supplier_table_name; ?>" class="btn btn-danger btn-sm"><i data-feather="trash-2"></i></a>  
              </div>
                  </td>
                </tr>
                @php $i++; @endphp @endforeach
              </tbody>
            </table>
             
            </div>
            </div>       
        </div>
        <div class="mb-3 col-md-5">
             
         </div>
       </div>
<!--------------------------------------------------------------->
            
 

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
<!--SWEET ALERT LINKS-->
<script>
        $(document).ready(function() {
          $('#item_store').DataTable();
      } );
       </script>

@endsection
