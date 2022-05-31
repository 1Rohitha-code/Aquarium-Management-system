@extends('admin.root.master_page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center">
        <div class="col-md-8">
            <div class="card" style="font-size:16px; width:50rem;  border: 2px solid rgb(132, 102, 214);">
                
                <div class="card-header" style="font-size:26px"><b>Add a new Category</b></div>
                 <!--alert-->
                 @if (session('status'))
                 <div class="text-center">
                 <h4><div class="alert alert-success" role="alert">
                       {{ session('status') }}
                 </div></h4>
                 </div>
               @endif
               <!--alert-->
                <div class="card-body">
                    <form method="POST" action="/save_data" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Category Name</label>

                            <div class="col-md-6">
                                <input id="category_name" type="text" class="form-control " name="category_name"  autofocus>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Add Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
