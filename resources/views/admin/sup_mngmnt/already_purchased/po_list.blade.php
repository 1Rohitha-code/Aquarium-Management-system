@extends('admin.root.master_page')

@section('title')
<title>All RFQ</title>
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
                <a href="" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>   
          
            

            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">Purchase Orders</span>
            </div>

            
            <div class="card-body">



              <table id="rfq_list" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th style="width:20px">No</th>
                    <th style="width:20px">PO ID</th>
                    <th style="width:20px">Sup. comp. name</th>
                    <th style="width:30px">Response expected date</th>
                    <th style="width:30px">PO Status</th>
           
                    
                </tr>
                </thead>
                <tbody>
            
           @php $i = "1"; @endphp 
           @foreach($po_details as $value)
             <tr>
                <td>
                 <?php echo $i; ?>
                </td>  
                <td>
                    {{$value->id}}
                </td>  
                <td>
                {{$value->supplier_comp_name}}  
                </td>  
                <td>
                {{$value->response_expected_date}}    
                </td>
                <td>
                {{$value->po_status}}    
                </td>
            </tr>
                   
                       
            @php $i++ ; @endphp 
            @endforeach
                </tbody>        
            </table>
          
             
            </div>
        </div>
    </div>

@endsection



    @section('datatablescripts')
<!----------------------------------------------------------->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!----------------------------------------------------------->

<!------------this code is used for select all check boxes at once------------------>



    <script>
        $(document).ready(function() {
          $('#rfq_list').DataTable();
      } );
       </script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<!--SWEET ALERT LINKS-->


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if (session('status'))
    Swal.fire({
    title: 'Quotation status updated!',
    icon: 'success',
    });
@endif
</script>
<!--SWEET ALERT LINKS-->



@endsection
