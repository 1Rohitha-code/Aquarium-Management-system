@extends('admin.root.master_page')

@section('title')
<title>View_pond_details</title>
@endsection

@section('seemorepagestyles')
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
@endsection



@section('content')
<a href="/view_ponds_list" class="btn btn-primary btn-pill">Back to Aqua Ponds list</a><br><br>
<div class="container">


             <div class="row">
               <div class="col-12 col-xl-6">
                    <div class="card" style="height:28rem">
                        <div class="card-body">
                            <div class="image_selected"><img src="{{asset('uploads/ponds/'.$data->image)}}" alt="Image"
                                class="image-responsive" style="width:400px; height:auto;"></div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-xl-6">
                    <div class="card" style="height:28rem">
                        <div class="card-body">
                            {{-- <div><span style="font-size:25px; color:rgb(4, 14, 4)"><b>Plant Name:</span> <span style="font-size:25px;color:green">{{$data->name}}</span></div>
                            <div><span style="font-size:25px;color:rgb(3, 7, 3)"><b>Price: Rs.</b></span> <span style="font-size:25px;color:green">{{$data->price}}</span><span style="font-size:25px;"><b>/=</b> </span> </div>
                            
                            <div><span style="font-size:15px;color:black"><b>Availability :</b></span> <span style="font-size:15px;color:red">{{$data->availability}}</span><span style="font-size:25px;"> </span> </div><br>

                            <div><li><span style="font-size:15px;color:rgb(12, 12, 170)">{{$data->characteristic_1}}</span></li><span style="font-size:25px;"> </span> </div><br>
                            <div><li><span style="font-size:15px;color:rgb(7, 7, 167)">{{$data->characteristic_2}}</span></li><span style="font-size:25px;"> </span> </div><br>
                            <div><li><span style="font-size:15px;color:rgb(9, 9, 161)">{{$data->characteristic_3}}</span></li><span style="font-size:25px;"> </span> </div><br>
                            <div><li><span style="font-size:15px;color:rgb(11, 11, 173)">{{$data->characteristic_4}}</span></li><span style="font-size:25px;"> </span> </div><br>
                            <div><span style="font-size:15px;color:black"><b>Commonly used to treat :</b></span><br> <span style="font-size:15px;color:rgb(7, 7, 172)">{{$data->treat_for}}</span><span style="font-size:25px;"> </span> </div><br> --}}

                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-left">
                                <h2>Instructions</h2>
                                </div>
                            <div> <span class="plant-para" style="font-size:15px;color:rgb(189, 3, 3)">xxxx</span> </div>
                            <hr>
                            <div class="text-left">
                                <h2>Product Details</h2>
                                </div>
                            <div> <span class="plant-para" style="font-size:15px;color:rgb(20, 12, 12)">xxxx</span> </div>
                        
                        </div>
                        

                    </div>
                </div>










            </div>
        </div>
    </div>
</div>





@endsection



@section('seemorescripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!--quantity update query-->
    <script>
        //setting default attribute to disabled of minus button
        document.querySelector(".minus-btn").setAttribute("disabled", "disabled");

        //taking value to increment decrement input value
        var valueCount

        //taking price value in variable
        var price = document.getElementById("price").innerText;

        //price calculation function
        function priceTotal() {
            var total = valueCount * price;
            document.getElementById("price").innerText = total
        }

        //plus button
        document.querySelector(".plus-btn").addEventListener("click", function() {
            //getting value of input
            valueCount = document.getElementById("quantity").value;

            //input value increment by 1
            valueCount++;

            //setting increment input value
            document.getElementById("quantity").value = valueCount;

            if (valueCount > 1) {
                document.querySelector(".minus-btn").removeAttribute("disabled");
                document.querySelector(".minus-btn").classList.remove("disabled")
            }

            //calling price function
            priceTotal()
        })

        //plus button
        document.querySelector(".minus-btn").addEventListener("click", function() {
            //getting value of input
            valueCount = document.getElementById("quantity").value;

            //input value increment by 1
            valueCount--;

            //setting increment input value
            document.getElementById("quantity").value = valueCount

            if (valueCount == 1) {
                document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
            }

            //calling price function
            priceTotal()
        })
    </script>
    <!--quantity update query-->




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

@endsection
