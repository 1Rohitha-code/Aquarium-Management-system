@extends('root.master_page')

@section('navbar')
@include('normal-user-pages.navbar')
@endsection


@section('content')

<div class="container-fluid p-0">
    <div class="row">
        @foreach($predefined_pond_gallary as $pond)
        <div class="card" style="width: 14rem;">
            <div style="width:100%; text-align:center">
                <a href="/pond_info/{{$pond->id}}" id="clickonimage">
                <img src="{{asset('uploads/ponds/'.$pond->image)}}" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <div class="text-left">


                    

                <span class="user-plant-gallary-name" style="color:rgb(3, 3, 10)"><strong>Pond ID:&nbsp;<span  style="color:rgb(6, 6, 214);font-size:18px">{{$pond->id}} </span></strong></span><br>
                <span class="user-plant-gallary-name" style="color:rgb(3, 3, 10)"><strong>Required Area :&nbsp;<span  style="color:rgb(6, 6, 214);font-size:18px">{{$pond->required_area}}</span></strong></span>
                <span class="card-text"><strong style="color:rgb(3, 3, 10)">Best for&nbsp;<span  style="color:rgb(6, 6, 214);font-size:18px" >{{$pond->place}}</span></strong></span><br>
                <span class="card-text"><strong style="color:rgb(3, 3, 10)">Total Cost&nbsp;<span  style="color:rgb(6, 6, 214);font-size:18px" >{{$pond->total_cost}}</span></strong></span>
                
                </div></a>
              {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            </div>
              <div class="card-footer">
                  <div class="form-group">
                    {{-- <a href="##" type="submit" class="btn btn-primary btn-lg btn-block" ><strong>See detail package</strong></a> --}}
                    <a href="#" type="submit" class="btn btn-success btn-lg btn-block" ><strong>Reqest to Build</strong></a>
                  </div>
                </div>
          </div>&nbsp;&nbsp;&nbsp;
        @endforeach
    </div>
</div>

@endsection


