@extends('root.master_page')

@section('seemorepagestyles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection




@section('navbar')
@include('normal-user-pages.navbar')
@endsection


@section('content')

<div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
             <div class="card" style="height:25rem;border-color:blue;border:2px solid blue">

                <div class="card-body m-sm-3 m-md-5">
                    <br><br>
                    <a href="/predefined_gallary" class="btn btn-dark btn-lg btn-block btn-pill "><span style="font-size:25px">Predefined Pond architectures</span></a>
                    <a href="" class="btn btn-primary btn-lg btn-block btn-pill  "><span style="font-size:25px"> Custom Pond architectures </span></a>

                </div>
             </div>
            </div>
        </div>
</div>

@endsection


@section('seemorescripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
