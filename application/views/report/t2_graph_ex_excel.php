<?php
// Excel file name for download 
$fileName = "export_bytype-" . date('d-M-Y') . ".xls"; 
 
// Headers for download 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
header("Content-Type: application/vnd.ms-excel");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            รายงานจำนวนหนังสือแยกตามประเภท
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
                            <div class="box-body">
                                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                    <tr role="row" class="info">
                                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 80%;">ประเภท</th>
                                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;"><center>จำนวนหนังสือ</center></th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($query as $rs) { ?>
                                                        <tr role="row">
                                                            <td><?php echo $rs->dname; ?></td>
                                                            <td align="center"><?php echo $rs->dtotal; ?></td>

                                                        </tr>
                                                    <?php  } ?>
                                                </tbody>
                                            </table>

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
                                                                $dt = $r->dname;

                                                                echo "'".$dt."'";
                                                                $i++;
                                                            } ?>

                                                            ],
                                                            datasets: [{
                                                                label: 'จำนวนหนังสือแยกตามประเภท',
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
                                    </div>
                                </div>
                            </div> 
                        </section><!-- /.content -->
                    </div><!-- /.row -->
                </div>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
