<div class="container-fluid p-0">

<div class="row mb-2 mb-xl-3">
 
</div>
<div class="row">
    <div class="col-xl-12">
        
        <div class="w-100">
            <div class="row">
                <div class="col-sm-4">
                    <a href="/order_details" style="text-decoration:none;">
                    <div class="card" style="background-color:#00FFFF;">
                        <div class="card-body">
                            <span class="card-title mb-4" style="font-size:25px;">Delivery Orders</span><br>
                            <span style="font-size:40px"><i class="fa fa-truck" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:35px;">
          <!----------------------this code segment displays the remaining order count ------------------------------------>
                         <?php 
                                   
                            if($delivered_order_count > 0){
                                $remaining_order_count = ($get_task_count - $delivered_order_count);
                                echo  $remaining_order_count;
                                if($remaining_order_count == 0){
                                    echo "<br>";
                                    echo '<span style="font-size:15px;color:black">You have no orders yet.</span>';           
                                }

                            }else if($get_task_count>0){
                                echo $get_task_count; 
                            }else{
                                echo '<span style="font-size:15px;color:black">You have no orders yet.</span>';
                            }
                               
                           ?>
                            </span>
                            &nbsp;<?php
                            
                            
                            ?>
                        </div>
                    </div>
                    </a>
                    <div class="card" style="background-color:#EEE8AA;">
                    <div class="card-body">
                            <span class="card-title mb-4" style="font-size:25px;">Card 2</span>
                            <h3 class="mt-1 mb-3">xx</h3>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-4">
                    <div class="card" style="background-color:#90EE90;">
                    <div class="card-body">
                            <span class="card-title mb-4" style="font-size:25px;">Card 3</span>
                            <h3 class="mt-1 mb-3">xxx</h3>
                            
                        </div>
                    </div>
                    <div class="card" style="background-color:#FFC0CB;">
                    <div class="card-body">
                            <span class="card-title mb-4" style="font-size:25px;">Card 4</span>
                            <h3 class="mt-1 mb-3">xxxx</h3>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-4">
                    <div class="card" style="background-color:#F0E68C;">
                    <div class="card-body">
                            <span class="card-title mb-4" style="font-size:25px;">Card 5</span>
                            <h3 class="mt-1 mb-3">xxxx</h3>
                            
                        </div>
                    </div>
                    <div class="card" style="background-color:#FF7F50;">
                    <div class="card-body">
                            <span class="card-title mb-4" style="font-size:25px;">Card 6</span>
                            <h3 class="mt-1 mb-3">xxx</h3>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

   
</div>



<div class="row">
<div class="col-xl-6 col-xxl-7">
        <div class="card flex-fill w-100">
            <div class="card-header">

                <h5 class="card-title mb-0">Recent Movement</h5>
            </div>
            <div class="card-body py-3">
                <div class="chart chart-sm">
                    <canvas id="chartjs-dashboard-line"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-xxl-7">
        <div class="card flex-fill w-100">
            <div class="card-header">

                <h5 class="card-title mb-0">Recent Movement</h5>
            </div>
            <div class="card-body py-3">
                <div class="chart chart-sm">
                    <canvas id="chartjs-dashboard-line"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
        <!-- <div class="card flex-fill w-100">
            <div class="card-header">

                <h5 class="card-title mb-0">Browser Usage</h5>
            </div>
            <div class="card-body d-flex">
                <div class="align-self-center w-100">
                    <div class="py-3">
                        <div class="chart chart-xs">
                            <canvas id="chartjs-dashboard-pie"></canvas>
                        </div>
                    </div>

                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>Chrome</td>
                                <td class="text-right">4306</td>
                            </tr>
                            <tr>
                                <td>Firefox</td>
                                <td class="text-right">3801</td>
                            </tr>
                            <tr>
                                <td>IE</td>
                                <td class="text-right">1689</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> -->
    </div>
   
   
</div>



</div>
