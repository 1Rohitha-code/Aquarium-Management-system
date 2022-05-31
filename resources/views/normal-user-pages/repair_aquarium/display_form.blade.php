@extends('root.master_page')

@section('navbar')
@include('normal-user-pages.navbar')
@endsection

@section('content') 
<div class="container">

          

<!------------------------right side column----------------------------------------->
<div class="container">  
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                

              <div class="box-footer pull-right">            
                <button class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>

        </div>
         



@endsection