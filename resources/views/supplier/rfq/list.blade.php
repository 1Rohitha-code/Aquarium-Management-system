
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
                <a href="##" class="btn btn-secondary"><i class="fa fa-step-backward" aria-hidden="true"></i>&nbsp; Back</a>
            </div>
         
               
          
            
        <div class="card">
            <div class="card-header text-center">
               <span style="font-size:25px;font-weight:bold">Recieved RFQs</span>
            </div>

            
            <div class="card-body">
              <table id="rfq_list" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width:30px">No</th>
                    <th style="width:30px">RFQ Ref. ID</th>
                    <th style="width:50px">RFQ Delivered at</th>
                    <th style="width:50px">Response expected date</th>   
                    <th style="width:50px">Status</th> 
                    <th style="width:50px">RFQ Letter</th>  
                    <th style="width:80px">Action</th>  
                </tr>
                </thead>
                <tbody>
 
            @php $i="1"; @endphp  @foreach($get_recieved_rfq as $data)
           
             <tr>
                    <td>
                        <?php echo $i; ?>
                    </td>
                       <td>

                      {{$data->id}}

                       </td>
                       <td>

                       {{$data->date_of_delivered}} 

                    </td>
                       <td>

                       {{$data->response_expected_date}}  


                       </td>
                     
                       <td>
                       <div class="text-center">

                       {{$data->rfq_status}}  


                        </div>
                       </td>
                       <td>
                       <div class="text-center">
                       <a href="/supp_rfq_letter/{{$data->user_id}}/{{$data->id}}" class="btn btn-danger "><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                   
                        </div>
                       </td>
                       <td>
                       <div class="text-center">
                           @if($data->rfq_status == "quotation sent from supplier")
                           <button type="button" class="btn btn-primary" disabled>Prepare Quotation</button>
                           @else
                           <a href="/prepare_quotation/{{$data->id}}" class="btn btn-primary">Prepare Quotation</a>
                           @endif
                        
                   
                      
                        </div>
                       </td>
                    </tr>
                    @php $i++; @endphp  @endforeach
                </tbody>        
            </table>
          
             
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
