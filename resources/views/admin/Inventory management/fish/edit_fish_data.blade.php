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

            <form  method="POST" action="/update_fish_data/{{$edit_product_data->id}}" enctype="multipart/form-data">
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
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Care level</label>
                        <select class="form-control my-colorpicker1" name="care_level" id="care_level">
                            <option value="Easy" {{($edit_product_data->care_level === 'Easy') ? 'Selected' : ''}}>Easy</option>
                            <option value="Easy-Moderate" {{($edit_product_data->care_level === 'Easy-Moderate') ? 'Selected' : ''}}>Easy-Moderate</option>
                            <option value="Moderate" {{($edit_product_data->care_level === 'Moderate') ? 'Selected' : ''}}>Moderate</option>
                          </select>

                    </div>
                </div>



                <div class="row">
                        <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">Color Form</label>
                        <select class="form-control my-colorpicker1" name="color_form" id="color_form">
                            <option value="Assorted" {{($edit_fish_data->color_form === 'Assorted') ? 'Selected' : ''}}>Assorted</option>
                            <option value="Black" {{($edit_fish_data->color_form === 'Black') ? 'Selected' : ''}}>Black</option>
                            <option value="Blue" {{($edit_fish_data->color_form === 'Blue') ? 'Selected' : ''}}>Blue</option>
                            <option value="Brown" {{($edit_fish_data->color_form === 'Brown') ? 'Selected' : ''}}>Brown</option>
                            <option value="Clear" {{($edit_fish_data->color_form === 'Clear') ? 'Selected' : ''}}>Clear</option>
                            <option value="Gold" {{($edit_fish_data->color_form === 'Gold') ? 'Selected' : ''}}>Gold</option>
                            <option value="Green" {{($edit_fish_data->color_form === 'Green') ? 'Selected' : ''}}>Green</option>
                            <option value="Grey" {{($edit_fish_data->color_form === 'Grey') ? 'Selected' : ''}}>Grey</option>
                            <option value="Orange" {{($edit_fish_data->color_form === 'Orange') ? 'Selected' : ''}}>Orange</option>
                            <option value="Pink" {{($edit_fish_data->color_form === 'Pink') ? 'Selected' : ''}}>Pink</option>
                            <option value="Purple" {{($edit_fish_data->color_form === 'Purple') ? 'Selected' : ''}}>Purple</option>
                            <option value="Red" {{($edit_fish_data->color_form === 'Red') ? 'Selected' : ''}}>Red</option>
                            <option value="Silver" {{($edit_fish_data->color_form === 'Silver') ? 'Selected' : ''}}>Silver</option>
                            <option value="Tan" {{($edit_fish_data->color_form === 'Tan') ? 'Selected' : ''}}>Tan</option>
                            <option value="Turquoise" {{($edit_fish_data->color_form === 'Turquoise') ? 'Selected' : ''}}>Turquoise</option>
                            <option value="White" {{($edit_fish_data->color_form === 'White') ? 'Selected' : ''}}>White</option>
                            <option value="Yellow" {{($edit_fish_data->color_form === 'Yellow') ? 'Selected' : ''}}>Yellow</option>
                          </select>
                        </div>



                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Temperament</label>
                            <select class="form-control my-colorpicker1" name="temperament" id="temperament">
                                <option value="Peaceful" {{($edit_fish_data->temperament=== 'Peaceful') ? 'Selected' : ''}}>Peaceful</option>
                                <option value="Semi-agressive" {{($edit_fish_data->temperament=== 'Semi-agressive') ? 'Selected' : ''}}>Semi-agressive</option>
                                <option value="Agressive" {{($edit_fish_data->temperament=== 'Agressive') ? 'Selected' : ''}}>Agressive</option>
                              </select>

                    </div>
                </div>


                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Feeding</label>
                        <select class="form-control my-colorpicker1" name="feeding" id="feeding">
                            <option value="Premium Fish Food Flakes" {{($edit_fish_data->feeding=== 'Premium Fish Food Flakes') ? 'Selected' : ''}}>Premium Fish Food Flakes</option>
                            <option value="Premium Pellet Food" {{($edit_fish_data->feeding=== 'Premium Pellet Food') ? 'Selected' : ''}}>Premium Pellet Food </option>
                            <option value="Premium Fish Food Flakes when small and Premium Pellet Food when larger" {{($edit_fish_data->feeding=== 'Premium Fish Food Flakes when small and Premium Pellet Food when larger') ? 'Selected' : ''}}>Premium Fish Food Flakes when small and Premium Pellet Food when larger</option>
                            <option value="Agressive" {{($edit_fish_data->feeding=== 'Agressive') ? 'Selected' : ''}}>Agressive</option>
                          </select>
                    </div>


                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Water Condition</label>
                        <input type="text" name="water_condition" value="{{$edit_fish_data->water_condition}}" class="form-control my-colorpicker1" placeholder="write">
                    </div>
                </div>


        <div class="row">
                <div class="mb-3 col-md-6">
                <label class="form-label" for="inputPassword4" style="font-size:16px">Size</label>
                        <select class="form-control my-colorpicker1" name="size" id="size">
                            <option value="now 1 inches to 1.5 inches, max 3.25 inches long" {{($edit_fish_data->size=== 'now 1 inches to 1.5 inches, max 3.25 inches long') ? 'Selected' : ''}}>now 1 inches to 1.5 inches, max 3.25 inches long</option>
                            <option value="now 1 inches to 1.2 inches, max 3.25 inches long" {{($edit_fish_data->size=== 'now 1 inches to 1.2 inches, max 3.25 inches long') ? 'Selected' : ''}}>now 1 inches to 1.2 inches, max 3.25 inches long</option>
                            <option value="now 1 inches to 1.5 inches, max 4 inches long" {{($edit_fish_data->size=== 'now 1 inches to 1.5 inches, max 4 inches long') ? 'Selected' : ''}}>now 1 inches to 1.5 inches, max 4 inches long</option>
                            <option value="now 1.5 inches to 2 inches, max 3 inches long" {{($edit_fish_data->size=== 'now 1.5 inches to 2 inches, max 3 inches long') ? 'Selected' : ''}}>now 1.5 inches to 2 inches, max 3 inches long</option>
                            <option value="now 1.5 inches to 2 inches, max 4 inches long" {{($edit_fish_data->size=== 'now 1.5 inches to 2 inches, max 4 inches long') ? 'Selected' : ''}}>now 1.5 inches to 2 inches, max 4 inches long</option>
                            <option value="now 1.5 inches to 2 inches, max 3.25 inches long" {{($edit_fish_data->size=== 'now 1.5 inches to 2 inches, max 3.25 inches long') ? 'Selected' : ''}}>now 1.5 inches to 2 inches, max 3.25 inches long</option>
                            <option value="now 1.5 inches to 2 inches, max 8 inches long" {{($edit_fish_data->size=== 'now 1.5 inches to 2 inches, max 8 inches long') ? 'Selected' : ''}}>now 1.5 inches to 2 inches, max 8 inches long</option>
                            <option value="now 2 inches to 2.5 inches, max 4 inches long" {{($edit_fish_data->size=== 'now 2 inches to 2.5 inches, max 4 inches long') ? 'Selected' : ''}}>now 2 inches to 2.5 inches, max 4 inches long</option>
                            <option value="now 2 inches to 2.5 inches, max 8 inches long" {{($edit_fish_data->size=== 'now 2 inches to 2.5 inches, max 8 inches long') ? 'Selected' : ''}}>now 2 inches to 2.5 inches, max 8 inches long</option>
                          </select>
                </div>

                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Behaviour</label>
                    <select class="form-control my-colorpicker1" name="behaviour" id="behaviour">
                        <option selected disabled>Select</option>
                        <option value="Attacker" {{($edit_fish_data->behaviour=== 'Attacker') ? 'Selected' : ''}}>Attacker</option>
                        <option value="Not attacker" {{($edit_fish_data->behaviour=== 'Not attacker') ? 'Selected' : ''}}>Not attacker</option>
                        <option value="Rarely aggressive" {{($edit_fish_data->behaviour=== 'Rarely aggressive') ? 'Selected' : ''}}>Rarely aggressive</option>
                        <option value="Active swimmers" {{($edit_fish_data->behaviour=== 'Active swimmers') ? 'Selected' : ''}}>Active swimmers</option>
                      </select>
                    </div>
        </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Fish type</label>
                        <select class="form-control my-colorpicker1" name="fish_type" id="fish_type">
                            <option value="Glofish" {{($edit_fish_data->fish_type === 'Glofish') ? 'Selected' : ''}}>Glofish</option>
                            <option value="Fancy gold fish" {{($edit_fish_data->fish_type=== 'Fancy gold fish') ? 'Selected' : ''}}>Fancy gold fish</option>
                            <option value="Gouramis" {{($edit_fish_data->fish_type === 'Gouramis') ? 'Selected' : ''}}>Gouramis</option>
                            <option value="Fancy Guppies" {{($edit_fish_data->fish_type === 'Fancy Guppies') ? 'Selected' : ''}}>Fancy Guppies</option>
                            <option value="Hatches" {{($edit_fish_data->fish_type=== 'Hatches') ? 'Selected' : ''}}>Hatches</option>
                            <option value="Kilifish" {{($edit_fish_data->fish_type=== 'Kilifish') ? 'Selected' : ''}}>Kilifish</option>
                            <option value="Larger Catfish" {{($edit_fish_data->fish_type=== 'Larger Catfish') ? 'Selected' : ''}}>Larger Catfish</option>
                            <option value="Gold Fish" {{($edit_fish_data->fish_type=== 'Gold Fish') ? 'Selected' : ''}}>Gold Fish</option>
                            <option value="Rainbow Fish" {{($edit_fish_data->fish_type=== 'Rainbow Fish') ? 'Selected' : ''}}>Rainbow Fish</option>
                            <option value="Freshwater Fish" {{($edit_fish_data->fish_type=== 'Freshwater Fish') ? 'Selected' : ''}}>Freshwater Fish</option>
                            <option value="Tetras" {{($edit_fish_data->fish_type=== 'Tetras') ? 'Selected' : ''}}>Tetras</option>
                          </select>
                        </div>

                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Breeding Time</label>
                            <input type="text" name="breeding_time" value="{{$edit_fish_data->breeding_time}}" class="form-control my-colorpicker1" >
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



