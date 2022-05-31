
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
               <span style="font-size:25px;font-weight:bold">Product data insertion form</span>
            </div>

            
            <div class="card-body">
               
            <table id="" class="table" style=" border: border: 1px solid black;;padding: 8px;">
                <thead>
                <tr>
                <th style="width:30px">No</th>
                    <th style="width:150px">Product Name</th>
                    <th style="width:200px">Image</th>
                    <th style="width:150px">Cat. name</th>

                    <th style="width:100px">Unit price</th>
                    <th style="width:90px">Quantity</th> 
                    <th style="width:100px">Action</th>   
                  
                </tr>
                </thead>
                <tbody>
             @php $i=1 ; @endphp
             <tr>
                    <td>
                        <?php echo $i;?>  
                       </td>
        <form action="/store_product_data/<?php echo $tableName; ?>" method="post" enctype="multipart/form-data">
            @csrf
          
                       <td>
        <input type="text" name="product_name" class="form-control" placeholder="product name">
        @error('product_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
                        </td>
                       <td>
                       <div class="custom-file">
    <input type="file" class="form-control" name="image" id="inputGroupFile01">
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
                       </td>
                       <td>
                       <div class="custom-file">
                       <select name="category_name" class="form-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="ornamental fish">Ornamental fish</option>
                        <option value="decoration">Decorations</option>
                        <option value="fishfood">Fishfood</option>
                        <option value="medicines">Medicines</option>
                        <option value="plants">Plants</option>
                        </select>
                        @error('category_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
   
                        </div>
                       </td>
                       <td>
        <input type="text" name="unit_price" class="form-control" placeholder="unit price">
        @error('unit_price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
                        </td>
                       <td>
                       <div class="text-center">
        <input type="text" name="quantity" class="form-control" placeholder="quantity">
        @error('quantity')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
                        </div>
                       </td>
                       <td>
                       <div class="text-center">
        <button type="submit" class="btn btn-primary" value="submit">Save data</button>
       
        </form>  
                        </div>
                       </td> 
                    
                    </tr>
                    
            @php $i++ ; @endphp
                </tbody>        
            </table>
          
          
             
            </div>
            </div>

<!-----------------------2nd card data-------------------------------------------------->
<div class="card">
            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">Product list</span>
            </div>

            
            <div class="card-body">
               
            <table id="" class="table" style=" border: border: 1px solid black;;padding: 8px;">
                <thead>
                <tr>
                <th style="width:30px">No</th>
                    <th style="width:150px"><div class="text-center">Product Name</div></th>
                    <th style="width:150px"><div class="text-center">Image</div></th>
                    <th style="width:150px"><div class="text-center">Cat. name</div></th>
                    <th style="width:100px"><div class="text-center">Unit price</div></th>
                    <th style="width:90px"><div class="text-center">Quantity</div></th> 
                    <th style="width:90px"><div class="text-center">Action</div></th> 
                  
                </tr>
                </thead>
                <tbody>
                
             @php $i=1 ; @endphp @foreach($result as $val)
             <tr>
                    <td>
                        <?php echo $i;?>  
                       </td>
       
          
                       <td>
        <input type="text" name="product_name"  class="form-control" value="{{$val['product_name']}}" disabled>

                        </td>
                       <td>
                       <div class="custom-file">
                           <div class="text-center">
                       <img src="{{asset('uploads/supplier_imgs/'.$val['image'])}}" width="100" height="70" alt="Image">
                     
                       <div class="pull-center">
                
                    <a href="/edit_image/{{$val['id']}}/<?php echo $tableName; ?>" style="width:110px;height:25px" class="btn btn-secondary btn-sm"><i class="fa fa-pencil-square"  aria-hidden="true"></i>&nbsp; Edit</a>
                       </div>
                        </div>
  </div>
                       </td>
                       <td>
                       <div class="custom-file">
                       <select name="category_name" disabled style="height:35px;color:black" class="form-select" id="inputGroupSelect01">
                        <option value="ornamentalfish" {{old('category_name',$val['category_name'])=="ornamentalfish"? 'selected':''}}>Ornamental fish</option>
                        <option value="decoration"   {{old('category_name',$val['category_name'])=="decoration"? 'selected':''}}>Decorations</option>
                        <option value="fishfood"  {{old('category_name',$val['category_name'])=="fishfood"? 'selected':''}}>Fishfood</option>
                        <option value="medicines"  {{old('category_name',$val['category_name'])=="medicines"? 'selected':''}}>Medicines</option>
                        <option value="plants"  {{old('category_name',$val['category_name'])=="plants"? 'selected':''}}>Plants</option>
                        </select>

   
                        </div>
                       </td>
                       <td>
        <input type="text" style="width:70px" value="{{$val['unit_price']}}" name="unit_price" class="form-control" disabled>
 
                        </td>
                       <td>
                       <div class="text-center">
        <input type="text" style="width:80px"  value="{{$val['quantity']}}" name="quantity" class="form-control" disabled>
   
                        </div>
                       </td>
                    <td>
                    <a href="/edit_product_data/{{$val['id']}}/<?php echo $tableName; ?>" class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                    <a href="/delete_record/{{$val['id']}}/<?php echo $tableName; ?>" class="btn btn-danger btn-sm"><i data-feather="trash-2"></i></a>
                    </td>
                    </tr>
                    
            @php $i++ ; @endphp @endforeach
                </tbody>        
            </table>
          
          
             
            </div>
            </div>
    <!----------------------------------------------------------------------->
          
             

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
          $('#rfq_list').DataTable();
      } );
       </script>

@endsection
