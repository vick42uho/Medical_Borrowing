<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ส่วนของเจ้าหน้าที่ดูแลอุปกรณ์การแพทย์
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url(''); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
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
                            <div class="col-sm-6">
                                <a class="btn btn-success" href="<?php echo  site_url('admin/adding'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูล</a>
                                <a class="btn btn-default" href="<?php echo  site_url('admin'); ?>" role="button"><i class="fa fa-fw fa-refresh fa-spin"></i> Refresh Data</a>
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
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">id</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 70%;">xx</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">xx</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">xx</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php// foreach ($results as $data) { ?>
                                        <tr role="row">
                                            <td align="center">xx</td>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td>
                                                    <a href="<?php // echo site_url('xx/edit/'.$data->id); ?>" class="btn btn-warning btn-xs">
                                                        แก้ไข
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger btn-xs" href="<?php // echo  site_url('xx/del/'.$data->id); ?>" role="button" onclick="return confirm('confirm delete?');"><i class="fa fa-fw fa-trash" ></i> ลบ</a>
                                                </td>
                                            </tr>
                                            <?php // } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div><!-- /.box-body -->
                    </div>
                    </section><!-- /.content -->
                    </div><!-- /.content-wrapper -->