<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            แสดงประวัติการยืม-คืน (แยกตามตำแหน่ง)
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
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 75%;">ตำแหน่ง</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;"><center>จำนวน</center></th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;"><center>เปิดดู</center></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $row) { ?>
                                        <tr role="row">
                                            <td align="center"><?php echo $row->pid;?></td>
                                            <td><?php echo $row->pname;?></td>
                                            <td align="center"><?php echo $row->total;?></td>
                                            <td align="center">
                                                <?php if($row->total>0){ ?>
                                                    <a href="<?php echo site_url('report/viewbyposition/'.$row->pid); ?>" target="_blank" class="btn btn-info btn-xs">
                                                    เปิดดู </a>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
                    </div><!-- /.content-wrapper -->