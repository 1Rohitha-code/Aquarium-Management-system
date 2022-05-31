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
           <h2><b>Add New Ornamental Fish</b></h2>
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

            <form  method="POST" action="/save_data_form" enctype="multipart/form-data">
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
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Price Increasing</label>
                        <input type="text" name="price_increasing" class="form-control my-colorpicker1" placeholder="Price Increasing">
                        @if($errors->has('price_increasing'))
                            <div class="error"><span style="color:red">{{ $errors->first('price_increasing') }}</span></div>
                        @endif    
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Supplied by</label>
                        <input type="text" name="supplied_by" class="form-control my-colorpicker1" >
                        @if($errors->has('supplied_by'))
                            <div class="error"><span style="color:red">{{ $errors->first('supplied_by') }}</span></div>
                        @endif
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Care level</label>
                        <select class="form-control my-colorpicker1" name="care_level" id="care_level">
                            <option selected disabled>Select</option>
                            <option>Easy</option>
                            <option>Easy-Moderate</option>
                            <option>Moderate</option>
                          </select>

                    </div>
                </div>



                <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputEmail4" style="font-size:16px">Color Form</label>
                            <select class="form-control my-colorpicker1" name="color_form" id="color_form">
                                <option selected disabled>Select</option>
                                <option>Assorted</option>
                                <option>Black</option>
                                <option>Blue</option>
                                <option>Brown</option>
                                <option>Clear</option>
                                <option>Gold</option>
                                <option>Green</option>
                                <option>Grey</option>
                                <option>Orange</option>
                                <option>Pink</option>
                                <option>Purple</option>
                                <option>Red</option>
                                <option>Silver</option>
                                <option>Tan</option>
                                <option>Turquoise</option>
                                <option>White</option>
                                <option>Yellow</option>
                              </select>
                        </div>



                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Temperament</label>
                        <select class="form-control my-colorpicker1" name="temperament" id="temperament">
                            <option selected disabled>Select</option>
                            <option>Peaceful</option>
                            <option>Semi-agressive</option>
                            <option>Agressive</option>
                          </select>

                    </div>
                </div>


                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Feeding</label>
                        <select class="form-control my-colorpicker1" name="feeding" id="feeding">
                            <option selected disabled>Select</option>
                            <option>Premium Fish Food Flakes</option>
                            <option>Premium Pellet Food </option>
                            <option>Premium Fish Food Flakes when small and Premium Pellet Food when larger</option>
                            <option>Agressive</option>
                            <option>Agressive</option>
                          </select>
                    </div>


                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Water Condition</label>
                        <input type="text" name="water_condition" class="form-control my-colorpicker1" placeholder="write">
                    </div>
                </div>


        <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Size</label>
                    <select class="form-control my-colorpicker1" name="size" id="size">
                        <option selected disabled>Select</option>
                        <option>now 1 inches to 1.5 inches, max 3.25 inches long</option>
                        <option>now 1 inches to 1.2 inches, max 3.25 inches long</option>
                        <option>now 1 inches to 1.5 inches, max 4 inches long</option>
                        <option>now 1.5 inches to 2 inches, max 3 inches long</option>
                        <option>now 1.5 inches to 2 inches, max 4 inches long</option>
                        <option>now 1.5 inches to 2 inches, max 3.25 inches long</option>
                        <option>now 1.5 inches to 2 inches, max 8 inches long</option>
                        <option>now 2 inches to 2.5 inches, max 4 inches long</option>
                        <option>now 2 inches to 2.5 inches, max 8 inches long</option>
                      </select>
                </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Behaviour</label>
                        <select class="form-control my-colorpicker1" name="behaviour" id="behaviour">
                            <option selected disabled>Select</option>
                            <option>Attacker</option>
                            <option>Not attacker</option>
                            <option>Rarely aggressive.</option>
                            <option>Active swimmers</option>
                          </select>
                    </div>
        </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4" style="font-size:16px">Fish type</label>
                        <select class="form-control my-colorpicker1" name="fish_type" id="fish_type">
                            <option selected disabled>Select</option>
                            <option>Glofish</option>
                            <option>Fancy gold fish</option>
                            <option>Gouramis</option>
                            <option>Fancy Guppies</option>
                            <option>Hatches</option>
                            <option>Kilifish</option>
                            <option>Larger Catfish</option>
                            <option>Gold Fish</option>
                            <option>Rainbow Fish</option>
                            <option>Freshwater Fish</option>
                            <option>Tetras</option>
                          </select>
                        </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Breeding Time</label>
                            <input type="text" name="breeding_time" class="form-control my-colorpicker1" >
                    </div>
                </div>

  

                <div class="row">

                    <div class="mb-3 col-md-6">
                        <a href="/display_fish_data" type="submit" class="btn btn-secondary btn-block btn-lg">Back</a>
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



