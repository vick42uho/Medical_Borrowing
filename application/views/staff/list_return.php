<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ส่วนของเจ้าหน้าที่ดูแลอุปกรณ์การแพทย์ : แสดงข้อมูลการคืนอุปกรณ์
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('staff'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
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

                            <a class="btn btn-primary" href="<?php echo  site_url('staff/add_lend5'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูลการยืม</a>

                            

                            <a class="btn btn-info" href="<?php echo  site_url('staff/add_lend4'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูลการยืม</a>

                            <a class="btn btn-default" href="<?php echo  site_url('staff'); ?>" role="button"><i class="fa fa-fw fa-refresh fa-spin"></i> Refresh Data</a>
                            
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <br />
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row" class="info">
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">#</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่ยืม</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 12%;">หน่วยงาน</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 16%;">ชื่อ-สกุล</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 17%;">อุปกรณ์</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">จนท.เครื่องมือแพทย์</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่คืน</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $row) { ?>
                                        <tr role="row">
                                            <td><img src="<?php echo base_url('devices_img/'.$row->d_img); ?>" width=50%></td>
                                            <td align="center">
                                                <?php 
                                                echo '<font color="Navy">';
                                                echo $row->mbr_date_lend; 
                                                echo '</b></font>';
                                                ?>

                                            </td>
                                            <td><?php echo $row->dname; ?></td>
                                            <td><?php 
                                            echo $row->m_fname.$row->m_name.' '.$row->m_lname; 
                                            echo '<br>';
                                            echo '<font color="red"><b>เหตุผลที่ยืม : ';
                                            echo '</b></font>'.$row->mbr_reason;
                                        ?></td>
                                        <td><?php echo $row->d_name; 
                                        echo '<br>';
                                        echo '<font color="blue"><b>รหัสอุปกรณ์ : ';
                                        echo $row->d_id;
                                        echo '</b></font>';
                                        ?>
                                    </td>
                                    <td><?php echo $row->mbr_staff_name_lend; ?></td>
<!--                                             <td>
                                                    <a href="<?php // echo site_url('xx/edit/'.$data->id); ?>" class="btn btn-success btn-xs">
                                                        อนุมัติ
                                                    </a>
                                                </td> -->
                                                <td align="center"><?php 
                                                echo '<font color="MediumVioletRed">';
                                                echo $row->mbr_date_return;
                                                echo '</b></font>'; 
                                                ?>
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