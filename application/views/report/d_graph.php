<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        รายงานจำนวนหนังสือรายวัน
        </h1>
    </section>
    <!-- Top menu -->
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <section class="content">
                                <!-- Your Page Content Here -->
                                <div class="box">
                                    <div class="box-body">
                                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    
                                                    <br>
                                                    <?php 


                                                            $total_sum=0;
                                                            
                                                            if(!empty($query)){ foreach ($query as $data) {  
                                                                
                                                                
                                                                
                                                                
                                                                $total_sum+=$data->dtotal;
                                                                
                                                                ?>
                                                                
                                                            
                                                            
                                                            <?php
                                                            
                                                            } } 
                                                            
                                                            echo 'จำนวนหนังสือทั้งหมด ';
                                                            echo $total_sum;
                                                            echo ' รายการ ';


                                                            ?>
                                                           
                                                            
                                                            <hr>
                                                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
                                                            
                                                            
                                                        
                                                    
                                                    <?php
                                                    
                                                    $beforyear = date('Y')-1;
                                                    $thisyear = date('Y');
                                                    $nextyear = date('Y')+1;
                                                    
                                                    
                                                    
                                                    ?>
                                                    <hr>
                                                    <p align="center">
                                                        <canvas id="myChart" width="800px" height="200px"></canvas>
                                                        <script>
                                                        var ctx = document.getElementById("myChart").getContext('2d');
                                                        var myChart = new Chart(ctx, {
                                                        type: 'bar',
                                                        data: {
                                                        labels: [
                                                        <?php
                                                        $i=0;
                                                        foreach ($query as $r) {
                                                        if($i>0){echo ',';}
                                                        //echo "'".$r->date."'";
                                                        echo "'".date('d-M-Y',strtotime($r->docsave))."'";
                                                        $i++;
                                                        } ?>
                                                        
                                                        ],
                                                        datasets: [{
                                                        label: 'จำนวนหนังสือแยกตามวัน',
                                                        data: [
                                                        <?php
                                                        $i=0;
                                                        foreach ($query as $r) {
                                                        if($i>0){echo ',';}
                                                        echo "'".$r->dtotal."'";
                                                        $i++;
                                                        } ?>
                                                        ],
                                                        backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                        'rgba(255,99,132,1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                        ],
                                                        borderWidth: 1
                                                        }]
                                                        },
                                                        options: {
                                                        scales: {
                                                        yAxes: [{
                                                        ticks: {
                                                        beginAtZero:true
                                                        }
                                                        }]
                                                        }
                                                        }
                                                        });
                                                        </script>
                                                    </p>
                                                    <br />
                                                </div>
                                                </section><!-- /.content -->
                                            </div>
                                           
                                        </div>
                                        </div><!-- /.box-body -->
                                    </div>
                                    </section><!-- /.content -->
                                    </div><!-- /.content-wrapper -->