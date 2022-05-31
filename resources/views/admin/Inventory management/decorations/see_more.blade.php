<!DOCTYPE html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <br>
   &nbsp; <a href="/display_decoration_data" class="btn btn-primary btn-pill">Back to Decorations list</a><br><br>



        


                <div class="container">
                    <div class="card" style="width:73rem;height:40rem;">
                        <div class="card-body">

                        <table class="table table-bordered">                   
                              <tr>
                                <th style="width:162px; font-size:30px">Name :{{$product_details->product_name}} </th>
                                <th style="width:422px; font-size:20px">Product ID : {{$product_details->id}}     |   Category ID : {{$product_details->category_id}}</th>
                                
                              </tr>
                              <tr>
                                <th rowspan="13">
                                    <div class="image_selected"><img src="{{asset('uploads/product_imgs/'.$product_details->image)}}" alt="Image"
                                        class="image-responsive" style="width:580px; height:auto;"></div>
                                    </div>
                                </th>
                                <td style="font-size:30px">Unit Price : LKR.{{$product_details->unit_price}}</td>
                                
                                
                            </tr>
                            <tr>
                                <td  style="font-size:16px"><strong>* Quantity : </strong>{{$product_details->quantity}}</td>
                              </tr>
                              <tr>
                                <td  style="font-size:16px"><strong>* Availability : </strong>{{$product_details->availability}} </td>
                              </tr>
                              <tr>
                                <td style="font-size:16px"><strong>* Supplied by : </strong>{{$product_details->supplied_by}}  </td>
                              </tr>
                              <tr>
                                <td style="font-size:16px"><strong>* Color : </strong>{{$decoration_details->color}} </td>
                              </tr>
                              <tr>
                                <td style="font-size:16px"><strong>* Material : </strong>{{$decoration_details->material}} </td>
                              </tr>
                              <tr>
                                <td style="font-size:16px"><strong>* Size:  </strong>{{$decoration_details->size}} </td>
                              </tr>
                              <tr>
                                <td style="font-size:16px"><strong>* About item: </strong> {{$decoration_details->about_item}}  </td>
                              </tr>

                             
                          </table>
                    
                
                </div>
            </div>
    


  
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>











