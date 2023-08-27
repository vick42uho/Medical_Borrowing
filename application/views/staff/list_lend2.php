<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ส่วนของเจ้าหน้าที่ดูแลอุปกรณ์การแพทย์ : แสดงข้อมูลการยืมอุปกรณ์
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

                            <a class="btn btn-warning" href="<?php echo  site_url('staff/p_approve'); ?>" role="button"><i class="fa fa-exchange" aria-hidden="true"></i> รออนุมัติยืม</a>

                            <a class="btn btn-primary" href="<?php echo  site_url('staff/l_approve'); ?>" role="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> อนุมัติยืมแล้ว</a>

                            <a class="btn btn-success" href="<?php echo  site_url('staff/r_approve'); ?>" role="button"><i class="fa fa-check-circle" aria-hidden="true"></i> คืนแล้ว</a>

                            <a class="btn btn-danger" href="<?php echo  site_url('staff/d_approve'); ?>" role="button"><i class="fa fa-thumbs-down" aria-hidden="true"></i> ไม่อนุมัติ</a>

                            <a class="btn btn-default" href="<?php echo  site_url('staff'); ?>" role="button"><i class="fa fa-fw fa-refresh fa-spin"></i> Refresh Data</a>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <br />
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row" class="info">
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่ทำรายการยืม</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ชื่อ-สกุล ผู้ยืม</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">อุปกรณ์</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">เหตุผล</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ผู้อนุมัติ</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">อนุมัติ</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ไม่อนุมัติ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $row) { ?>
                                        <tr role="row">
                                            <td align="center"><?php echo $row->mbr_datesave; ?></td>
                                            <td><?php 
                                            echo $row->m_fname.$row->m_name.' '.$row->m_lname; 
                                        ?></td>
                                        <td><?php echo $row->d_name; ?></td>
                                        <td><?php echo $row->mbr_reason; ?></td>
                                        <td><?php echo $row->mbr_staff_name_lend; ?></td>
                                        <td>
                                            <a align="center" href="<?php echo site_url('staff/approve_lend/'.$row->id); ?>" class="btn btn-primary btn-xs">
                                                อนุมัติ
                                            </a>
                                        </td>
                                        <td>
                                            <a align="center" class="btn btn-danger btn-xs" href="<?php echo  site_url('staff/unapprove_lend/'.$row->mbr_id ); ?>" role="button"> ไม่อนุมัติ</a>
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