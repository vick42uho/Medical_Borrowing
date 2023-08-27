<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            แสดงรายงาน (แยกตามประเภทอุปกรณ์)
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
                <!--     <h3 class="box-title">ตารางข้อมูล</h3> -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    <div class="row">
                        <div class="col-sm-6">
                            <br />

                            <?php
                            $t_name = array();
                            $total = array();
                            foreach ($query as $row) {
                                $t_name[] = "\"".$row->t_name."\"";
                                $total[] = "\"".$row->total."\"";
                            }
                            $t_name = implode(",", $t_name);
                            $total = implode(",", $total);
                                // echo '<hr>';
                                // echo $t_name;
                                // echo '<br>';
                                // echo $total;
                            ?>
                            <div class="chart-container">
                                <div class="pie-chart-container">

                                    <canvas id="pie-chartcanvas-1" width="300px"></canvas>
                                </div>
                            </div>
                            <!-- javascript -->
                            <!-- Include all compiled plugins (below), or include individual files as needed -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    var ctx1 = $("#pie-chartcanvas-1");
                                    var data1 = {
                                        labels : [<?php echo $t_name;?>],
                                        datasets : [
                                        {
                                            label : "JOB",
                                            data : [<?php echo $total;?>],
                                            backgroundColor : [
                                            "#0a27ff",
                                            "#ff430a",
                                            "#0affe2",
                                            "#00d115",
                                            "#de71dc",
                                            "#ffde0a"
                                            ],
                                            borderColor : [
                                            "#000d9c",
                                            "#000d9c",
                                            "#000d9c",
                                            "#000d9c",
                                            "#000d9c",
                                            "#000d9c"
                                            ],
                                            borderWidth : [1, 1, 1, 1, 1]
                                        }
                                        ]
                                    };

                                    var options = {
                                        title : {
                                            display : true,
                                            position : "center",
                                            text : "",
                                            fontSize : 19,
                                            fontColor : "#111"
                                        },
                                        legend : {
                                            display : true,
                                            position : "left"
                                        }
                                    };
                                    var chart1 = new Chart( ctx1, {
                                        type : "pie",
                                        data : data1,
                                        options : options
                                    });
                                });
                            </script>


                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
                </div><!-- /.content-wrapper -->