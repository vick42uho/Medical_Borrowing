<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            แสดงประวัติการยืม-คืน (แยกตามหน่วยงาน)
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('report'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active"> จัดการอุปกรณ์การแพทย์ </li>
        </ol>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">ตารางข้อมูล</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    <div class="row">
                        <div class="col-sm-12">
                            <br />
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row" class="info">
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ID</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 75%;">หน่วยงาน</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;"><center>จำนวน</center></th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;"><center>เปิดดู</center></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $row) { ?>
                                        <tr role="row">
                                            <td align="center"><?php echo $row->did;?></td>
                                            <td><?php echo $row->dname;?></td>
                                            <td align="center"><?php echo $row->total;?></td>
                                            <td align="center">
                                                <?php if($row->total>0){ ?>
                                                    <a href="<?php echo site_url('report/viewbydivision/'.$row->did); ?>" target="_blank" class="btn btn-info btn-xs">
                                                    เปิดดู </a>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>


                            <br>
                            <?php 


                            $total_sum=0;

                            if(!empty($query)){ foreach ($query as $data) {  




                                $total_sum+=$data->total;

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
                                                label: 'จำนวนหน่วยงาน',
                                                data: [
                                                <?php
                                                $i=0;
                                                foreach ($query as $r) {
                                                    if($i>0){echo ',';}
                                                    echo "'".$r->total."'";
                                                    $i++;
                                                } ?>
                                                ],
                                                backgroundColor: [
                                                'rgba(255, 0, 0, 0.2)',
                                                'rgba(60, 179, 113, 0.2)',
                                                'rgba(255, 165, 0, 0.2)',
                                                'rgba(0, 0, 255, 0.2)',
                                                'rgba(238, 130, 238, 0.2)',
                                                'rgba(106, 90, 205, 0.2)',
                                                'rgba(38, 109, 0, 0.2)',
                                                'rgba(130, 109, 0, 0.2)',
                                                'rgba(143, 0, 74, 0.2)',
                                                'rgba(143, 153, 74, 0.2)'
                                                ],
                                                borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(135, 102, 103, 1)',
                                                'rgba(155, 135, 135, 1)',
                                                'rgba(166, 145, 145, 1)',
                                                'rgba(199, 155, 155, 1)',
                                                'rgba(255, 122, 44, 1)',
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
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
                    </div><!-- /.content-wrapper -->