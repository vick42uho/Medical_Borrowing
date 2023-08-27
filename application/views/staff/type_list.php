<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        จัดการประเภทอุปกรณ์ทางการแพทย์
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('staff'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active"> จัดการประเภทอุปกรณ์ทางการแพทย์ </li>
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
                                <a class="btn btn-success" href="<?php echo  site_url('staff/add_type'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูล</a>
                                <a class="btn btn-default" href="<?php echo  site_url('staff/type'); ?>" role="button"><i class="fa fa-fw fa-refresh fa-spin"></i> Refresh Data</a>
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
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 70%;">ชื่อประเภทอุปกรณ์ทางการแพทย์</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $rs) { ?>
                                        <tr role="row">
                                            <td align="center"><?php echo $rs->t_id; ?></td>
                                            <td><?php echo $rs->t_name; ?></td>
                                            <td>
                                                    <a href="<?php echo site_url('staff/edit_type/'.$rs->t_id); ?>" class="btn btn-warning btn-xs">
                                                        แก้ไข
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger btn-xs" href="<?php echo  site_url('staff/del_type/'.$rs->t_id); ?>" role="button" onclick="deletedata()"><i class="fa fa-fw fa-trash" ></i> ลบ</a>
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