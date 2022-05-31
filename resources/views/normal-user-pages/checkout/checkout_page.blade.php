@extends('root.master_page')

@section('seemorepagestyles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
@endsection


@section('navbar')
@include('normal-user-pages.navbar')
@endsection



@section('content')

                    <div class="card_checkout-card">
                    <section class="bg-info">
                        <div class="container">
                            <div class="row top-lable">                                  
                                <div class="col-md-10 mt-2 py-2">
                                <div class="text-center">
                                        <span style="font-size:35px;"><b>CHECKOUT PROCESS </b></span>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </section>


     
                       <div class="container">
                            <div class="row g-2">
                                <div class="col-md-12 col-lg-2 order-md-last"><br><br>
                                    <div class="card your-cart-checkout">
                                    <h4 class="d-flex justify-content-between align-items-center mb-2">
                                        &nbsp;<span>Your Cart</span>
                                      <span class="basket-item-count" style="font-size: 17px">
                                       <span class="badge rounded-pill bg-danger">0 </span>
                                       </span>
                                      </h4>

                                    @if(isset($cart_data))
                                    @if(Cookie::get('shopping_cart'))
                                        @php $total="0" @endphp
                                            <table class="table bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width:290px">Product Name</th>
                                                        <th  style="width:100px">Unit Price</th>
                                                        <th>Qty</th>
                                                    </tr>
                                               </thead>
                                               <tbody>
                                                    @foreach ($cart_data as $data) 
                                                        <tr>
                                                            <td>
                                                            {{ $data['product_name'] }}
                                                            </td>
                                                            <td>
                                                            {{ number_format($data['unit_price'],2) }}
                                                            </td>
                                                            <td>
                                                            {{ $data['num_of_items'] }}
                                                            </td>
                                                            
                                                             @php 
                                                             $total =   $total + ($data["num_of_items"] * $data["unit_price"])  
                                                             @endphp
                                                           <script> var cnvrtdFrmphpTojs = <?php echo json_encode($total); ?>;</script>
                                                        </tr>
                                                    @endforeach
                                                        
                                                   
                                                </tbody>
                                            </table>

                                           
                                            <hr> 
                                            <div class="text-right">
                                                  <!--Adding delivery cost to total-->
                                                  
                                                     <!--Adding delivery cost to total-->

                                                
                                                <table class="table">
                                                       
                                                        <tbody>
                                                        <!--Sub total-->
                                                        <tr>
                                                                <td colspan="2">Sub Total : LKR.</td>
                                                            <td> 
                                                                <div class="pull-right">
                                                            <input type="text" id="sbttl" disabled class="form-control input-sm" value="{{ number_format($total, 2) }}" style="font-size:18px;">  
                                                                <script>
                                                                    var subtt = document.getElementById("sbttl").value;
                                                                 </script>
                                                            </div>    
                                                        </td>
                                                            </tr>
                                                        <!--Sub total-->

                                                        <!--delivery charges-->
                                                            <tr>
                                                                <td colspan="2">Delivery Charges : LKR.</td>
                                                            <td> 
                                                                <div class="pull-right">   
                                                                
                                                            <input type="text" disabled id="textFieldValueJS" class="form-control input-sm" placeholder="Delivery Cost" name="city" style="font-size:18px;">
                                                         
                                                                </div>       
                                                        </td>
                                                            </tr>
                                                        <!--delivery charges-->

                                                          <!--Order Total-->
                                                          <tr class="x">
                                                                <td colspan="2"><div class="text-left">
                                                                <span style="font-size:20px"> Order Total: LKR. 
                                                                </div>
                                                                    </span>
                                                                </td>
                                                            <td> 
                                                                <div class="pull-left">
                                                            <!-- <input type="text" disabled class="form-control input-sm">-->
                                                            <div class="ordertotal">  
                                                            <b><p id="demo" class="pdemo" style="font-size:35px"> </p></b>
                                                           
                                                            
                                                         

                                                            </div>
                                                                </div>     
                                                        </td>
                                                            </tr>
                                                        <!--Order Total-->
                                                        </tbody>
                                                        </table>       
                                               <br>

                                                
                                            </div>
                                                   
                                        @endif
                                    @else
                                    <div class=row>
                                        <div class="col-md-12 text-center">
                                            <div class="shadow border py-5">
                                                <h4>Your cart is currently empty.</h4>
                                                <a href="{{url('collections')}} class="btn btn-upper btn-primary outer-left> </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                

                                <div class="col-md-6 col-lg-6"><br>
                                    <div class="card shadow border py-3 home_del_form" >
                                        <div class="text-center">
                                    <span style="font-size:32px";color:black>Home Delivery Information</span>
                                        </div><br>

                                        <div class="container">
                                 <form  method="POST" action="{{url('/place-order')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                            
                                    <div class="row">
                                        <div class="mb-2 col-md-6">
                                            <div class="form-group">   
                                            <label class="form-label" for="inputEmail4" style="font-size:16px">First Name</label>
                                            <input type="text" name="first_name" class="form-control my-colorpicker1" placeholder="" >
                                        </div>
                                        </div>

                                        <div class="mb-2 col-md-6">
                                            <div class="form-group">
                                            <label class="form-label" for="inputPassword4" style="font-size:16px">Last Name</label>
                                            <input type="text" name="last_name" class="form-control my-colorpicker1" placeholder="" >
                                            </div>
                                        </div>
                                    </div>

                                <div class="row">
                                    <div class="mb-2 col-md-6">
                                        <div class="form-group">
                                        <label class="form-label" for="inputPassword4" style="font-size:16px">Phone number</label>
                                        <input type="text" name="phone_no" class="form-control my-colorpicker1" placeholder="" >
                                        </div>
                                    </div>

                                    <div class="mb-2 col-md-6">
                                        <div class="form-group">
                                        <label class="form-label" for="inputEmail4" style="font-size:16px">Alternate Number</label>
                                        <input type="text" name="alternate_no" class="form-control my-colorpicker1" placeholder="" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-2 col-md-12">
                                        <div class="form-group">
                                        <label class="form-label" for="inputPassword4" style="font-size:16px">Address line 1</label>
                                        <input type="text" name="address_line1" class="form-control my-colorpicker1" placeholder="" >
                                        </div>
                                    </div>

                                    <div class="mb-2 col-md-12">
                                        <div class="form-group">
                                        <label class="form-label" for="inputPassword4" style="font-size:16px">Address line 2</label>
                                        <input type="text" name="address_line2" class="form-control my-colorpicker1" placeholder="" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-2 col-md-12">
                                        <div class="form-group">
                                        <label class="form-label" for="inputPassword4" style="font-size:16px">Location</label>
                                         <input type="text" name="location" class="form-control my-colorpicker1" placeholder="Paste google map URL" >
                                        </div>
                                    </div>

                                    <div class="mb-2 col-md-6">
                                        <div class="form-group">
                              <!------------------send a pending status for order status----------------------->                              
                              <input type="hidden" name="order_status" class="form-control my-colorpicker1" value="pending">          
                            </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-2 col-md-12">
                                        <div class="form-group   change_total">
                                            <label class="form-label" for="inputEmail4" style="font-size:16px">City</label>
                                           
                                          

                                            <select  class="form-control my-colorpicker1"  onchange="deliverycostAgainstCity()" name="delivery_cost" id="city">
                                            <option selected disabled>Select Your city</option>
                                            @foreach ($cost_details as $value)
                                            <option value="{{$value->cost}}"><h6 id="cityvalue"> {{$value->city}} </h6></option>   

                                            @endforeach 
                                            </select> 

                                            <!--try to send city-->
                                           
                                            <!--try to send city-->
                                  
                                  
                                    <!-- <input type="text" disabled id="textFieldValueJS" class="form-control"
                    placeholder="Delivery Cost">  -->
                                        </div>
                                    </div>
                                       
                                        <div class="mb-2 col-md-12">
                                        <div class="form-group">
                                        <label class="form-label" for="inputEmail4" style="font-size:16px">Email</label>
                                        <input type="text" name="email" class="form-control my-colorpicker1" placeholder="" >   
                                        </div>
                                    </div>
                                </div>

                              
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <div class="form-group">
                                    <!-- <button  type="submit" name="place_order_btn"  class="btn btn-success btn-block btn-lg">Place Your Order</button> -->
                                    <!--mycode for button-->
                                    <input type="submit" value="Place Your Order" name="post" class="btn btn-block btn-primary finalpost" >
                                    <!--mycode for button-->
                                </div>
                                </div>

                                <div class="mb-3 col-md-12">
                                        <div class="form-group">
                                        </div>
                                     </div>
                                  </div>
                            </form>                              
                       </div>
                   </div>
                       
                   

                            <footer class="my-5 pt-5 text-muted text-center text-small">
                              <p class="mb-1">&copy; 2017–2021 Bright Aqua</p>
                              <ul class="list-inline">
                                <li class="list-inline-item"><a href="#">Privacy</a></li>
                                <li class="list-inline-item"><a href="#">Terms</a></li>
                                <li class="list-inline-item"><a href="#">Support</a></li>
                              </ul>
                            </footer>
                          </div>

                        

@endsection 

@section('datatablescripts')
<script src="{{ asset('assets/checkout.js') }}"></script>
<script>
            function deliverycostAgainstCity() {
            var selObj = document.getElementById("city");
            //this part is used to get selected value of input  
            var selValue = selObj.options[selObj.selectedIndex].value;
            //this code is used to display the selected value of input in <p> tags.
             document.getElementById("textFieldValueJS").value = selValue; 
            //this code is used to convert string to number    
            var deliveryCost = parseFloat(selValue);
            //this code is used to asign php variable to a javascript variable
           

            var sum = deliveryCost + cnvrtdFrmphpTojs;
            var orderTotal =  sum.toFixed(2);

            
            //this code is used to display the orderTotal value inside shopping cart box
            document.getElementById("demo").innerHTML = orderTotal;
       
        }
        
    </script>


<!--Take selected value of-->

 <!--SWEET ALERT LINKS-->
<script src="js/sweetalert.min.js"></script>

<!--alert msg before submitting order-->
<script>
 $('.finalpost').click(function (e){
    e.preventDefault();
    let form = $(this).parents('form');
    swal({
        title: 'Are you sure?',
        text: '',
        icon: 'info',
        buttons: ["Make Changes", "Yes.!"],
    }).then(function(value) {
        if(value){
            form.submit();
        }
        
    });
});

</script>

<!--Alert msg after submitting order-->
<script>
    @if (session('status'))
swal({
  title: '{{session('status')}}',
  text:'Check your mail for order details',
  icon: '{{session('statuscode')}}',
  button: "OK",
});
@endif
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--JQUERY CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



   





@endsection
