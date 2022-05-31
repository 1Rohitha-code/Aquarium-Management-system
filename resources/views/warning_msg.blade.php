@extends('root.master_page')

@section('title')

@endsection

@section('navbar')

@endsection

@section('content')
<!--page content-->
<div class="row">
                  
                        <div class="col-lg-12">
                            <div class="col-md-8">
                        @if (session('status'))
                       <h4>
                        <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                        </div>  
                            </div>
                        </div>
                        </h4>
                    @endif

                   <h4> {{ __('You are logged in!') }}</h4>

                    
                  </div>
                  </div>
                </div>
                     </div>
                    </div>

                <!--page content ends-->

@endsection