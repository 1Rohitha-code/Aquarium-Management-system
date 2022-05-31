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
           <h2><b>Edit Decoration profile</b></h2>
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

            <form  method="POST" action="/update_decoration_data/{{$edit_product_data->id}}" enctype="multipart/form-data">
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
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Availability</label>
                        <select class="form-control my-colorpicker1" name="availability" id="availability">
                            <option value="in stock" {{($edit_product_data->availability === 'in stock') ? 'Selected' : ''}}>in stock</option>
                            <option value="out of stock" {{($edit_product_data->availability === 'out of stock') ? 'Selected' : ''}}>out of stock</option>
                          </select>
                    </div>


                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4" style="font-size:16px">Supplied by</label>
                            <input type="text" name="supplied_by" value="{{$edit_product_data->supplied_by}}" class="form-control my-colorpicker1" >

                        </div>
                </div>


                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">Color</label>
                        <input type="text" name="color" value="{{$edit_decoration_profile->color}}" class="form-control my-colorpicker1" placeholder="Color" >
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Material</label>
                        <select class="form-control my-colorpicker1" name="material"  id="material">
                            <option value="Natural" {{($edit_decoration_profile->material === 'Natural') ? 'Selected' : ''}}>Natural</option>
                            <option value="Plastic" {{($edit_decoration_profile->material === 'Plastic') ? 'Selected' : ''}}>Plastic</option>
                            <option value="Ceramic" {{($edit_decoration_profile->material === 'Ceramic') ? 'Selected' : ''}}>Ceramic</option>
                            <option value="Stones" {{($edit_decoration_profile->material === 'Stones') ? 'Selected' : ''}}>Stones</option>
                            <option value="Aquarium coral Reef" {{($edit_decoration_profile->material === 'Aquarium coral Reef') ? 'Selected' : ''}}>Aquarium coral Reef</option>
                          </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">size</label>
                        <input type="text" name="size" value="{{$edit_decoration_profile->size}}" material class="form-control my-colorpicker1" placeholder="Size" >
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Availability</label>
                        <select class="form-control my-colorpicker1" name="availability" id="availability">
                       <option value="in stock" {{($edit_decoration_profile->material === 'in stock') ? 'Selected' : ''}}>in stock</option>
                      <option value="out of stock" {{($edit_decoration_profile->material === 'out of stock') ? 'Selected' : ''}}>out of stock</option>
                  </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">About Item</label>
                        <textarea type="text" class="form-control my-colorpicker1" name="about_item" id="about_item" rows="6" placeholder="About Item">
                            {{$edit_decoration_profile->about_item}}

                        </textarea>
                    </div>
                    <div class="mb-3 col-md-6">

                    </div>
                </div>


                <div class="row">
                    <div class="mb-3 col-md-6">
                        <a href="/display_decoration_data" type="submit" class="btn btn-secondary btn-block btn-lg">Back</a>
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



