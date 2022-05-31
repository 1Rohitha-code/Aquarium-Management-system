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

            <form  method="POST" action="/update_plant_data/{{$edit_product_data->id}}" enctype="multipart/form-data">
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
   
                    </div>


                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4" style="font-size:16px">Supplied by</label>
                            <input type="text" name="supplied_by" value="{{$edit_product_data->supplied_by}}" class="form-control my-colorpicker1" >

                        </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">Growth rate</label>
                        <select class="form-control my-colorpicker1"  name="growth_rate" id="growth_rate">
                            <option value="Slow" {{($plant_list->growth_rate === 'Slow') ? 'Selected' : ''}}>Slow</option>
                            <option value="Medium" {{($plant_list->growth_rate === 'Medium') ? 'Selected' : ''}}>Medium</option>
                            <option value="Fast" {{($plant_list->growth_rate === 'Fast') ? 'Selected' : ''}}>Fast</option>
                            <option value="If light source better,fast growing" {{($plant_list->growth_rate === 'If light source better,fast growing') ? 'Selected' : ''}}>If light source better,fast growing</option>
                          </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Light Demand</label>
                        <select class="form-control my-colorpicker1" name="light_demand" id="light_demand">
                            <option value="Low" {{($plant_list->light_demand === 'Low') ? 'Selected' : ''}}>Low</option>
                            <option value="Medium" {{($plant_list->light_demand === 'Medium') ? 'Selected' : ''}}>Medium</option>
                            <option value="High" {{($plant_list->light_demand === 'High') ? 'Selected' : ''}}>High</option>
                            <option value="Medium to High" {{($plant_list->light_demand === 'Medium to High') ? 'Selected' : ''}}>Medium to High</option>
                            <option value="High to low" {{($plant_list->light_demand === 'High to low') ? 'Selected' : ''}}>High to low</option>
                            <option value="Low to High" {{($plant_list->light_demand === 'Low to High') ? 'Selected' : ''}}>Low to High</option>
                          </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">Available as</label>
                        <select class="form-control my-colorpicker1" name="available_as" id="available_as">
                            <option value="potted" {{($plant_list->available_as === 'potted') ? 'Selected' : ''}}>potted</option>
                            <option value="bare root" {{($plant_list->available_as === 'bare root') ? 'Selected' : ''}}>bare root</option>
                            <option value="pot or bare root clump" {{($plant_list->available_as === 'pot or bare root clump') ? 'Selected' : ''}}>pot or bare root clump</option>
                            <option value="bulb" {{($plant_list->available_as === 'bulb') ? 'Selected' : ''}}>bulb</option>
                            <option value="bunch" {{($plant_list->available_as === 'bunch') ? 'Selected' : ''}}>bunch</option>
                          </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Placement in Tank</label>
                        <select class="form-control my-colorpicker1" name="placement_in_tank" id="placement_in_tank">
                            <option value="Background" {{($plant_list->placement_in_tank === 'Background') ? 'Selected' : ''}}>Background</option>
                            <option value="Surface of the tank" {{($plant_list->placement_in_tank === 'Surface of the tank') ? 'Selected' : ''}}>Surface of the tank</option>
                            <option value="Bottom of the tank" {{($plant_list->placement_in_tank === 'Bottom of the tank') ? 'Selected' : ''}}>Bottom of the tank</option>
                            <option value="Middle of the tank" {{($plant_list->placement_in_tank === 'Middle of the tank') ? 'Selected' : ''}}>Middle of the tank</option>
                          </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputEmail4" style="font-size:16px">P-H level</label>
                        <select class="form-control my-colorpicker1"  name="pH" id="pH" >
                            <option value="1-3" {{($plant_list->pH === '1-3') ? 'Selected' : ''}}>1-3</option>
                            <option value="3-5" {{($plant_list->pH === '3-5') ? 'Selected' : ''}}>3-5</option>
                            <option value="5-6" {{($plant_list->pH === '5-6') ? 'Selected' : ''}}>5-6</option>
                            <option value="5-7" {{($plant_list->pH === '5-7') ? 'Selected' : ''}}>5-7</option>
                            <option value="5-8" {{($plant_list->pH === '5-8') ? 'Selected' : ''}}>5-8</option>
                            <option value="6-7.5" {{($plant_list->pH === '6-7.5') ? 'Selected' : ''}}>6-7.5</option>
                            <option value="6-9" {{($plant_list->pH === '6-9') ? 'Selected' : ''}}>6-9</option>
                          </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">CO2</label>
                        <select class="form-control my-colorpicker1" name="CO2" id="CO2">
                            <option value="None" {{($plant_list->CO2 === 'None') ? 'Selected' : ''}}>None</option>
                            <option value="Low" {{($plant_list->CO2 === 'Low') ? 'Selected' : ''}}>Low</option>
                            <option value="Medium" {{($plant_list->CO2 === 'Medium') ? 'Selected' : ''}}>Medium</option>
                            <option value="High" {{($plant_list->CO2 === 'High') ? 'Selected' : ''}}>High</option>
                          </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlSelect1" style="font-size:16px">Care Level</label>
                        <select class="form-control my-colorpicker1"  name="care_level" id="care_level">
                          <option value="Easy" {{($plant_list->care_level === 'Easy') ? 'Selected' : ''}}>Easy</option>
                          <option value="Medium" {{($plant_list->care_level === 'Medium') ? 'Selected' : ''}}>Medium</option>
                          <option value="Difficult" {{($plant_list->care_level === 'Difficult') ? 'Selected' : ''}}>Difficult</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Leaves</label>
                        <select class="form-control my-colorpicker1" name="leaves" id="leaves">
                            <option value="less than 5mm" {{($plant_list->leaves === 'less than 5mm') ? 'Selected' : ''}}>less than 5mm</option>
                            <option value="approximately 5mm" {{($plant_list->leaves === 'approximately 5mm') ? 'Selected' : ''}}>approximately 5mm</option>
                            <option value="approximately 1cm" {{($plant_list->leaves === 'approximately 1cm') ? 'Selected' : ''}}>approximately 1cm</option>
                            <option value="approximately 2cm" {{($plant_list->leaves === 'approximately 2cm') ? 'Selected' : ''}}>approximately 2cm</option>
                            <option value="approximately 3cm" {{($plant_list->leaves === 'approximately 3cm') ? 'Selected' : ''}}>approximately 3cm</option>
                            <option value="between 3cm & 6cm" {{($plant_list->leaves === 'between 3cm & 6cm') ? 'Selected' : ''}}>between 3cm & 6cm</option>
                            <option value="between 6cm & 10cm" {{($plant_list->leaves === 'between 6cm & 10cm') ? 'Selected' : ''}}>between 6cm & 10cm</option>
                            <option value="between 10cm & 20cm" {{($plant_list->leaves === 'between 10cm & 20cm') ? 'Selected' : ''}}>between 10cm & 20cm</option>
                            <option value="more than 20cm" {{($plant_list->leaves === 'more than 20cm') ? 'Selected' : ''}}>more than 20cm</option>
                          </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Description</label>
                        <textarea class="form-control my-colorpicker1"  name="description" id="description" rows="3" placeholder="Description">
                            {{$plant_list->description}}
                        </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                        
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <a href="/display_plant_data" type="submit" class="btn btn-secondary btn-block btn-lg">Back</a>
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



