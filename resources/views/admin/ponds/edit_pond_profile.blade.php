@extends('admin.root.master_page')

@section('form_layout_header_links')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
@endsection


@section('content')
<div class="container">

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="text-center">
                <br>
           <h2>Update Medicine Profile</h2>
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

            <form action="/update_pond_profile/{{$edit_pond_profile->id}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input type="hidden" name="id" id="id" value="{{$edit_pond_profile->id}}">

                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Required area</label>
                    <input type="text" name="required_area" value="{{$edit_pond_profile->required_area}}" class="form-control my-colorpicker1" placeholder="Required area" required>
                    {{-- @error('price')
                  <p style="color:red">{{$message}}</p>
                  @enderror --}}
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px" required>Depth</label>
                        <input type="text" name="depth"  value="{{$edit_pond_profile->depth}}" class="form-control my-colorpicker1">
                    </div>
                </div>



                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">No of days required to complete :</label>
                        <select class="form-control my-colorpicker1" name="duration" id="duration">
                            <option value="1 day" {{($edit_pond_profile->duration === '1 day') ? 'Selected' : ''}}>1 day</option>
                            <option value="1 and 1/2 days" {{($edit_pond_profile->duration === '1 and 1/2 days') ? 'Selected' : ''}}>1 and 1/2 days</option>
                            <option value="2 and 1/2 days" {{($edit_pond_profile->duration === '2 days') ? 'Selected' : ''}}>2 days</option>
                            <option value="2 and 1/2 days" {{($edit_pond_profile->duration === '2 and 1/2 days') ? 'Selected' : ''}}>2 and 1/2 days</option>
                            <option value="3 days" {{($edit_pond_profile->duration === '3 days') ? 'Selected' : ''}}>3 days</option>
                            <option value="3 and 1/2 days" {{($edit_pond_profile->duration === '3 and 1/2 days') ? 'Selected' : ''}}>3 and 1/2 days</option>
                            <option value="4 days" {{($edit_pond_profile->duration === '4 days') ? 'Selected' : ''}}>4 days</option>
                            <option value="4 and 1/2 days" {{($edit_pond_profile->duration === '4 and 1/2 days') ? 'Selected' : ''}}>4 and 1/2 days</option>
                            <option value="within 10 days" {{($edit_pond_profile->duration === 'within 10 days') ? 'Selected' : ''}}>within 10 days</option>
                            <option value="withing 20 days" {{($edit_pond_profile->duration === 'withing 20 days') ? 'Selected' : ''}}>withing 20 days</option>
                          </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Total cost :</label>
                    <input type="text" name="total_cost" value="{{$edit_pond_profile->total_cost}}" class="form-control my-colorpicker1" placeholder="Rs." required>
                    </div>
                </div>



                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px" required>Image</label>
                        <input type="file" name="image" value="{{$edit_pond_profile->image}}" class="form-control my-colorpicker1"> 
                        {{-- @error('image')
                        <p style="color:red">{{$message}}</p>
                        @enderror --}}
                    </div>

                    <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4" style="font-size:16px">Suitable for :</label>
                            <select class="form-control my-colorpicker1" name="place" id="place">
                                <option  value="Home land" {{($edit_pond_profile->place === 'Home land') ? 'Selected' : ''}}>Home land</option>
                                <option  value="Office environment" {{($edit_pond_profile->place === 'Office environment') ? 'Selected' : ''}}>Office environment</option>
                                <option  value="Inside house" {{($edit_pond_profile->place === 'Inside house') ? 'Selected' : ''}}>Inside house</option>
                              </select>
                    </div>
                </div>

               
                 <!--collapse button-->
                 <button class="btn btn-info btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    include Package details
                   </button><br>
                 <div class="collapse" id="collapseExample">
                
                 <!--start checkbox-->              
                 <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>Decorative water features:</strong></label>
                        <select class="form-control my-colorpicker1" name="dec_water_type" id="dec_water_type">
                            <option value="Fountain Kit" {{($edit_pond_profile->dec_water_type === 'Fountain Kit') ? 'Selected' : ''}}>Fountain Kit</option>
                            <option value="Fountain toppers" {{($edit_pond_profile->dec_water_type === 'Fountain toppers') ? 'Selected' : ''}}>Fountain toppers</option>
                          </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        {{-- <select class="form-control my-colorpicker1" name="pond_filters" id="place">
                            <option selected disabled>Choose</option>
                            <option>Pond skimmer</option>
                            <option>BioFalls Filter</option>
                            <option>UltraKlean Pond Filter</option>
                            <option>Submersible Pond Filter</option>
                            <option>Waterfall spillways</option>
                            <option>UltraKlean UV Clarifier</option>
                            <option>Add-on Pond Filter</option>
                            <option>Wetland and bog filter</option>
                            <option>Container water garden filter</option>
                          </select>  --}}
                          <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>Pipes and plumbing:</strong></label>
                        <select class="form-control my-colorpicker1" name="plmbing_type" id="plmbing_type">
                            <option  value="Flexible PVC Pipe" {{($edit_pond_profile->plmbing_type === 'Flexible PVC Pipe') ? 'Selected' : ''}}>Flexible PVC Pipe</option>
                            <option  value="Kink-Free Pipe" {{($edit_pond_profile->plmbing_type === 'Kink-Free Pipe') ? 'Selected' : ''}}>Kink-Free Pipe</option>
                            <option  value="Black Vinyl tubing" {{($edit_pond_profile->plmbing_type === 'Black Vinyl tubing') ? 'Selected' : ''}}>Black Vinyl tubing</option>
                          </select>
                    </div>  
                  </div>

                  <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>Pond pumps :</strong></label>
                        <select class="form-control my-colorpicker1" name="pond_pumps" id="pond_pumps">
                            <option  value="AquaSurge Pump" {{($edit_pond_profile->pond_pumps === 'AquaSurge Pump') ? 'Selected' : ''}}>AquaSurge Pump</option>
                            <option  value="Black Vinyl tubing" {{($edit_pond_profile->pond_pumps === 'SLD Pond Pump') ? 'Selected' : ''}}>SLD Pond Pump</option>
                            <option value="PL & PN Pump" {{($edit_pond_profile->pond_pumps === 'PL & PN Pump') ? 'Selected' : ''}}>PL & PN Pump</option>
                            <option value="EcoWave Pumps" {{($edit_pond_profile->pond_pumps === 'EcoWave Pumps') ? 'Selected' : ''}}>EcoWave Pumps</option>
                            <option value="Aquaforce Pump" {{($edit_pond_profile->pond_pumps === 'Aquaforce Pump') ? 'Selected' : ''}}>Aquaforce Pump</option>
                            <option value="Aquajet Pump" {{($edit_pond_profile->pond_pumps === 'Aquajet Pump') ? 'Selected' : ''}}>Aquajet Pump</option>
                            <option value="Pond Powerhead" {{($edit_pond_profile->pond_pumps === 'Pond Powerhead') ? 'Selected' : ''}}>Pond Powerhead</option>
                            <option value="Ultra water Pump" {{($edit_pond_profile->pond_pumps === 'Ultra water Pump') ? 'Selected' : ''}}>Ultra water Pump</option>
                            <option value="Statuary Water Pump" {{($edit_pond_profile->pond_pumps === 'Statuary Water Pump') ? 'Selected' : ''}}>Statuary Water Pump</option>
                            <option value="Cleanout Pumps & Hose" {{($edit_pond_profile->pond_pumps === 'Cleanout Pumps & Hose') ? 'Selected' : ''}}>Cleanout Pumps & Hose</option>
                          </select>  
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>LED Lights & Lightning :</strong></label>
                        <select class="form-control my-colorpicker1" name="led_lightning" id="led_lightning">
                            <option value="Warm white LED Pond Lights" {{($edit_pond_profile->led_lightning === 'Warm white LED Pond Lights') ? 'Selected' : ''}}>Warm white LED Pond Lights</option>
                            <option value="Color changing LED lights" {{($edit_pond_profile->led_lightning === 'Color changing LED lights') ? 'Selected' : ''}}>Color changing LED lights</option>
                            <option value="LED path & area lights" {{($edit_pond_profile->led_lightning === 'LED path & area lights') ? 'Selected' : ''}}>LED path & area lights</option>
                          </select>
                    </div>  
                  </div>

                  <div class="row">
                   <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>Aqua Plants:</strong></label>
                        {{-- <select class="form-control my-colorpicker1" name="water_treatments" id="place">
                            <option selected disabled>Choose</option>
                            <option>Creeping jenny pond plants</option>
                            <option>Pickerel Pond Plants</option>
                            <option>Horsetail Pond Plants</option>
                            <option>Taro pond plants</option>
                            <option>Cardinal flower</option>
                            <option>Lotus</option>
                            <option>Water lettuce</option>
                            <option>Mosaic Plant</option>
                            <option>Blue lris</option>
                            <option>Sweet Flag</option>
                            

                          </select> --}}
                          <textarea class="form-control my-colorpicker1" name="aqua_plants" id="aqua_plants" rows="3" placeholder="Aqua plants">
                                {{$edit_pond_profile->aqua_plants}}
                          </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>Pond Filters :</strong></label>    
                        <textarea class="form-control my-colorpicker1" name="filter_type"  id="filter_type" rows="3" placeholder="Pond filters">
                            {{$edit_pond_profile->filter_type}}
                        </textarea>

                    </div>  
                  </div>
                

                  <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>Aqua Fish:</strong></label>
                        {{-- <select class="form-control my-colorpicker1" name="place" id="place">
                            <option selected disabled>Choose</option>
                            <option>Sinhala barb</option>
                            <option>Guppy</option>
                            <option>Siamese fighting fish</option>
                            <option>Discus</option>
                            <option>Freshwater angelfish</option>
                            <option>Neon Tetra</option>
                            <option>Goldfish</option>
                            <option>Zebrafish</option>
                            <option>Oscar</option>
                            <option>Southern Platyfish</option>
                            <option>Koi</option>
                            <option>Green Swordtail</option>
                            <option>Sinhala barb</option>
                            <option>Tiger barb</option>
                            <option>Catfish</option>
                            <option>Clown loach</option>
                            <option>Rainbow kribs</option>
                            <option>Rosy barb</option>
                            <option>Cichild</option>
                            <option>Pearl Gourami</option>
                            <option>Cherry barb</option>
                            <option>Gold barb</option>
                            <option>Congo tetra</option>
                            <option>Gobiidae</option>
                            <option>Killifish</option>
                          </select>    --}}

                          <textarea class="form-control my-colorpicker1" name="fish_types"  id="fish_types" rows="3" placeholder="Aqua Fish">
                            {{$edit_pond_profile->fish_types}}
                          </textarea>
                          
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>Stones & Gravel :</strong></label>
                        {{-- <select class="form-control my-colorpicker1" name="place" id="place">
                            <option selected disabled>Choose</option>
                            <option>Aquarium Fish tank pebbles stones mixture 1-3cm</option>
                            <option>Aquarium Fish tank Gravel white pebbles 3-5cm</option>
                            <option>Aquarium Fish tank Gravel white pebbles 1-2cm</option>
                            <option>Aquarium Fish tank pebbles stones mixture 1-2cm</option>
                            <option>River rock stones</option>
                            <option>Capcouriers small slate stones 1 to 2 inches</option>
                            <option>Exotic pebbles PMS0510</option>
                            <option>Emsco group landscape rock</option>
                            <option>Margo garden products</option>
                            <option>4 pounds 2-3 inch natural rocks</option>
                          </select> --}}

                          <textarea class="form-control my-colorpicker1" name="stones_gravel_type" id="stones_gravel_type" rows="3" placeholder="Stones & Gravel">
                            {{$edit_pond_profile->stones_gravel_type}}
                          </textarea>
                    </div>   
                  </div>          
                 <!--end checkbox-->
               
       
                </div>
               <!--collapse button-->
                <br>
                <div class="row">
                <div class="mb-3 col-md-6">
                    <form-group>
                    <a href="/view_ponds_list" type="submit" class="btn btn-secondary btn-block btn-lg">Back</a>
                </div>
                <div class="mb-3 col-md-6">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Update Profile</button>
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



