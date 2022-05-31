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
           <h2><b>Add New Aquarium Medicine Product</b></h2>
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

            <form  method="POST" action="/save_medicines_form" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">Category</label>
                        <select class="form-control my-colorpicker1" name="category_id" id="category_id">
                            <option selected disabled>Select</option>
                            @foreach ($category_type as $value)
                            <option value="{{$value->id}}"> {{$value->category_name}}</option>
                            @endforeach
                      </select>
                    
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">Name</label>
                        <input type="text" name="product_name" class="form-control my-colorpicker1" placeholder="Name">
                        @if($errors->has('product_name'))
                            <div class="error"><span style="color:red">{{ $errors->first('product_name') }}</span></div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Unit Price</label>
                        <input type="text" name="unit_price" class="form-control my-colorpicker1" placeholder="Rs.">
                        @if($errors->has('unit_price'))
                            <div class="error"><span style="color:red">{{ $errors->first('unit_price') }}</span></div>
                        @endif
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Qty</label>
                        <input type="text" name="quantity" class="form-control my-colorpicker1" placeholder="quantity">
                        @if($errors->has('quantity'))
                            <div class="error"><span style="color:red">{{ $errors->first('quantity') }}</span></div>
                        @endif
                    </div>
                </div>



                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Image</label>
                        <input type="file" name="image" class="form-control my-colorpicker1" >
                    </div>


                        <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Supplied by</label>
                        <input type="text" name="supplied_by" class="form-control my-colorpicker1" >
                        @if($errors->has('supplied_by'))
                            <div class="error"><span style="color:red">{{ $errors->first('supplied_by') }}</span></div>
                        @endif     
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px" required>Characteristics</label>
                        <input type="text" name="characteristic_1" class="form-control my-colorpicker1"  placeholder="Characteristric 1">
                        <input type="text" name="characteristic_2" class="form-control my-colorpicker1" placeholder="Characteristric 2 optional">
                        <input type="text" name="characteristic_3" class="form-control my-colorpicker1"  placeholder="Characteristric 3 optional">
                        <input type="text" name="characteristic_4" class="form-control my-colorpicker1"  placeholder="Characteristric 4 optional">
                    </div>
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px" required>Commonly Use to treat</label>
                        <textarea class="form-control my-colorpicker1" name="treat_for" id="treat_for" rows="5" placeholder="purpose"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                    <label class="form-label" for="inputPassword4" style="font-size:16px" required>Product Details</label>
                        <textarea class="form-control my-colorpicker1" name="product_details" id="product_details" rows="5" placeholder="purpose"></textarea>
                    </div>
                    <div class="mb-3 col-md-12">
                    <label class="form-label" for="inputEmail4" style="font-size:16px">Instructions</label>
                        <textarea class="form-control my-colorpicker1" name="instructions" id="instructions" rows="5" placeholder="How to use"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Price Increasing</label>
                        <input type="text" name="price_increasing" class="form-control my-colorpicker1" placeholder="Price Increasing">
                        @if($errors->has('price_increasing'))
                            <div class="error"><span style="color:red">{{ $errors->first('price_increasing') }}</span></div>
                        @endif 
                    </div>
                    <div class="mb-3 col-md-6">
           
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
@endsection



