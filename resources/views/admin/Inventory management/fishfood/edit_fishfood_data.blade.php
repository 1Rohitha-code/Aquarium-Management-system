@extends('admin.root.master_page')

@section('form_layout_header_links')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
@endsection


@section('content')
<div class="container">

<div class="col-md-12">
    <div class="card" style="font-size:16px;   border: 2px solid rgb(132, 102, 214);">
        <div class="card-header">
            <div class="text-center">
           <h2><b>Edit Fishfood Profile</b></h2>
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

            <form  method="POST" action="/update_fishfood_data/{{$edit_product_data->id}}" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">Name</label>
                        <input type="text" name="product_name" value="{{$edit_product_data->product_name}}" class="form-control my-colorpicker1" placeholder="Name">

                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Unit Price</label>
                        <input type="text" name="unit_price" value="{{$edit_product_data->unit_price}}" class="form-control my-colorpicker1" placeholder="Rs.">
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Qty</label>
                        <input type="text" name="quantity" value="{{$edit_product_data->quantity}}"  class="form-control my-colorpicker1" placeholder="quantity">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Image</label>
                        <input type="file" name="image" value="{{$edit_product_data->image}}" class="form-control my-colorpicker1" >
                    </div>
                </div>



                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Supplied by</label>
                            <input type="text" name="supplied_by" value="{{$edit_product_data->supplied_by}}" class="form-control my-colorpicker1" >

                    </div>


                        <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">Weight</label>
                        <input type="text" name="weight" value="{{$edit_fishfood_profile->weight}}" class="form-control my-colorpicker1" placeholder="Weight" >
                        </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Available as</label>
                        <select class="form-control my-colorpicker1" name="available_as" id="available_as">
                            <option selected disabled>Select</option>
                            <option value="Liquid" {{($edit_fishfood_profile->available_as === 'Liquid') ? 'Selected' : ''}}>Liquid</option>
                            <option value="Solid" {{($edit_fishfood_profile->available_as === 'Solid') ? 'Selected' : ''}}>Solid</option>
                            <option value="Flakes" {{($edit_fishfood_profile->available_as === 'Flakes') ? 'Selected' : ''}}>Flakes</option>
                            <option value="Sinking sticks" {{($edit_fishfood_profile->available_as === 'Sinking sticks') ? 'Selected' : ''}}>Sinking sticks</option>
                            <option value="Powder" {{($edit_fishfood_profile->available_as === 'Powder') ? 'Selected' : ''}}>Powder</option>
                            <option value="Sinking Wafers" {{($edit_fishfood_profile->available_as === 'Sinking Wafers') ? 'Selected' : ''}}>Sinking Wafers</option>
                            <option value="Sinking Pellets" {{($edit_fishfood_profile->available_as === 'Sinking Pellets') ? 'Selected' : ''}}>Sinking Pellets</option>
                            <option value="Gel" {{($edit_fishfood_profile->available_as === 'Gel') ? 'Selected' : ''}}>Gel</option>
                          </select>
                    </div>
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputEmail4" style="font-size:16px">Characteristics</label>
                            <input type="text" name="characteristic_1" value="{{$edit_fishfood_profile->characteristic_1}}" class="form-control my-colorpicker1"  placeholder="Characteristric 1">
                            <input type="text" name="characteristic_2" value="{{$edit_fishfood_profile->characteristic_2}}" class="form-control my-colorpicker1" placeholder="Characteristric 2 optional">
                            <input type="text" name="characteristic_3" value="{{$edit_fishfood_profile->characteristic_3}}" class="form-control my-colorpicker1"  placeholder="Characteristric 3 optional">
                            <input type="text" name="characteristic_4" value="{{$edit_fishfood_profile->characteristic_4}}" class="form-control my-colorpicker1"  placeholder="Characteristric 4 optional">
                        </textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                      

                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">Product Details</label>
                        <textarea class="form-control my-colorpicker1" name="product_details" id="product_details" rows="7" placeholder="Product details">
                            {{$edit_fishfood_profile->product_details}}
                        </textarea>
                    </div>
                </div>


                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Ingredients</label>
                        <textarea class="form-control my-colorpicker1" name="ingredients" id="ingredients" rows="6" placeholder="Ingredients">
                            {{$edit_fishfood_profile->ingredients}}
                        </textarea>

                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Feeding suggestions</label>
                        <textarea class="form-control my-colorpicker1" name="feeding_suggestions" id="feeding_suggestions" rows="6" placeholder="Feeding suggestions">
                            {{$edit_fishfood_profile->feeding_suggestions}}
                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <a href="/display_fishfood_data" type="submit" class="btn btn-secondary btn-block btn-lg">Back</a>
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



