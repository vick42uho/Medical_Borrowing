<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        จัดการสถานะ
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('staff'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active"> จัดการสถานะ </li>
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
                            <div class="col-sm-6">
                                <a class="btn btn-success" href="<?php echo  site_url('staff/add_status'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูล</a>
                                <a class="btn btn-default" href="<?php echo  site_url('staff/status'); ?>" role="button"><i class="fa fa-fw fa-refresh fa-spin"></i> Refresh Data</a>
                            </div>
                            <div class="col-sm-6">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <br />
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="info">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">รหัส</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 70%;">ชื่อสถานะ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($querystatus as $rs) { ?>
                                        <tr role="row">
                                            <td align="center"><?php echo $rs->s_id; ?></td>
                                            <td><?php echo $rs->s_name; ?></td>
                                            <td>
                                                    <a href="<?php echo site_url('staff/edit_status/'.$rs->s_id); ?>" class="btn btn-warning btn-xs">
                                                        แก้ไข
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger btn-xs" href="<?php echo  site_url('staff/del_status/'.$rs->s_id); ?>" role="button" onclick="return confirm('ยืนยันการลบ?')"><i class="fa fa-fw fa-trash" ></i> ลบ</a>
                                                </td>
                                            </tr>
                                            <?php  } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div><!-- /.box-body -->
                    </div>
                    </section><!-- /.content -->
                    </div><!-- /.content-wrapper -->