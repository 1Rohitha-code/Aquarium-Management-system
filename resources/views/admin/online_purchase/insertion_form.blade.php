@extends('admin.root.master_page')

@section('form_layout_header_links')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
@endsection


@section('content')
<div class="container">

<div class="col-md-12">
    <div class="card" style="font-size:16px;   border: 2px solid rgb(54, 102, 27);">
        <div class="card-header">
            <div class="text-center">
           <h2><b>Distance vs Cost details</b></h2>
        </div>
    </div>
        <div class="card-body">

            <!--alert-->
            {{-- @if (session('status'))
            <div class="text-center">
              <div class="alert alert-success" role="alert">
                    {{ session('status') }}
              </div>
            </div>
            @endif --}}
            <!--alert-->

            <form  method="POST" action="/save_form" enctype="multipart/form-data">
                {{csrf_field()}}

            
                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">City</label>
                        <input type="text" name="city" class="form-control my-colorpicker1" placeholder="Ex : Colombo">
                    </div>
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Cost</label>
                        <input type="text" name="cost" class="form-control my-colorpicker1" placeholder="Ex : Rs.10.00">
                    </div>
                </div>
                
             

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <a href="/display_medicines_data" type="submit" class="btn btn-secondary btn-block btn-lg">Back</a>
                    </div>

                    <div class="mb-3 col-md-6">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Save</button>
                    </div>
                </div>










            </form>
        </div>
    </div>
</div>
</div>
@endsection


@section('form_layout_links')

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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
@endsection



