@extends('admin.root.master_page')

@section('form_layout_header_links')

@endsection


@section('content')
<div class="container">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                <h2>Add New Pond profile</h2>
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

            <form method="post" action="/ponds_adding_form" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="inputPassword4" style="font-size:16px">Required area</label>
                    <input type="text" name="required_area" class="form-control my-colorpicker1" placeholder="Required area">
                    @error('required_area')
                  <p style="color:red">{{$message}}</p>
                  @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px" required>Depth</label>
                        <input type="text" name="depth" pattern="[a-zA-Z0-9]+" class="form-control my-colorpicker1">
                        @error('depth')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                </div>



                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">No of days required to complete :</label>
                        <select class="form-control my-colorpicker1" name="duration" id="duration">
                            <option selected disabled>Select</option>
                            <option>1 day</option>
                            <option>1 and 1/2 days</option>
                            <option>2 days</option>
                            <option>2 and 1/2 days</option>
                            <option>3 days</option>
                            <option>3 and 1/2 days</option>
                            <option>4 days</option>
                            <option>4 and 1/2 days</option>
                            <option>within 10 days</option>
                            <option>withing 20 days</option>
                          </select>
                          @error('duration')
                          <p style="color:red">{{$message}}</p>
                          @enderror
                        </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px">Total cost :</label>
                    <input type="text" name="total_cost" class="form-control my-colorpicker1" placeholder="Rs.">
                    @error('total_cost')
                  <p style="color:red">{{$message}}</p>
                  @enderror
                </div>
                </div>



                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px" >Image</label>
                        <input type="file" name="image" class="form-control my-colorpicker1">
                        @error('image')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4" style="font-size:16px">Suitable for :</label>
                            <select class="form-control my-colorpicker1" name="place" id="place">
                                <option selected disabled>Select</option>
                                <option>Home land</option>
                                <option>Office environment</option>
                                <option>Inside house</option>
                              </select>
                    </div>
                </div>

               
                 <!--collapse button-->
                 <button class="btn btn-info btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    include Package details
                   </button>
                 <div class="collapse" id="collapseExample"><br>
                
                 <!--start checkbox-->              
                 <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>Decorative water features:</strong></label>
                        <select class="form-control my-colorpicker1" name="dec_water_type" id="place">
                            <option selected disabled>Choose</option>
                            <option>Fountain Kit</option>
                            <option>Fountain toppers</option>
                          </select>
                          @error('dec_water_type')
                        <p style="color:red">{{$message}}</p>
                        @enderror
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
                            <option selected disabled>Choose</option>
                            <option>Flexible PVC Pipe</option>
                            <option>Kink-Free Pipe</option>
                            <option>Black Vinyl tubing</option>
                          </select>
                    </div>  
                  </div>

                  <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>Pond pumps :</strong></label>
                        <select class="form-control my-colorpicker1" name="pond_pumps" id="place">
                            <option selected disabled>Choose</option>
                            <option>AquaSurge Pump</option>
                            <option>SLD Pond Pump</option>
                            <option>PL & PN Pump</option>
                            <option>EcoWave Pumps</option>
                            <option>Aquaforce Pump</option>
                            <option>Aquajet Pump</option>
                            <option>Pond Powerhead</option>
                            <option>Ultra water Pump</option>
                            <option>Statuary Water Pump</option>
                            <option>Cleanout Pumps & Hose</option>
                          </select>  
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>LED Lights & Lightning :</strong></label>
                        <select class="form-control my-colorpicker1" name="led_lightning" id="led_lightning">
                            <option selected disabled>Choose</option>
                            <option>Warm white LED Pond Lights</option>
                            <option>Color changing LED lights</option>
                            <option>LED path & area lights</option>
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
                          <textarea class="form-control my-colorpicker1" name="aqua_plants" id="aqua_plants" rows="3" placeholder="Aqua plants"></textarea>
                          @error('aqua_plants')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    
                        </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="inputPassword4" style="font-size:16px"><strong>Pond Filters :</strong></label>    
                        <textarea class="form-control my-colorpicker1" name="filter_type" id="filter_type" rows="3" placeholder="Pond filters"></textarea>
                        @error('filter_type')
                        <p style="color:red">{{$message}}</p>
                        @enderror
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

                          <textarea class="form-control my-colorpicker1" name="fish_types" id="fish_types" rows="3" placeholder="Aqua Fish"></textarea>
                          @error('fish_types')
                          <p style="color:red">{{$message}}</p>
                          @enderror
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

                          <textarea class="form-control my-colorpicker1" name="stones_gravel_type" id="stones_gravel_type" rows="3" placeholder="Stones & Gravel"></textarea>
                          @error('stones_gravel_type')
                          <p style="color:red">{{$message}}</p>
                          @enderror
                        </div>   
                  </div>          
                 <!--end checkbox-->
               
                 </div>       
               <!--collapse button-->

               <br><br>
                <div class="row">
                    <div class="mb-3 col-md-6">
                    <form-group>
                    <a href="/view_ponds_list" type="submit" class="btn btn-secondary btn-block btn-lg">Back</a>
                    </div>
                    <div class="mb-3 col-md-6">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Save</button>
                    </div>
                </div>
            </form>

    </div>
</div>
</div>
@endsection


@section('form_layout_links')

@endsection



