<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        จัดการสมาชิก
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('admin'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active"> จัดการสมาชิก </li>
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
                                <a class="btn btn-success" href="<?php echo  site_url('member/adding'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูล</a>
                                <a class="btn btn-default" href="<?php echo  site_url('member'); ?>" role="button"><i class="fa fa-fw fa-refresh fa-spin"></i> Refresh Data</a>
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
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รูปภาพ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ตำแหน่ง</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">หน่วยงาน</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 40%;">ชื่อ-นามสกุล</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">pwd</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $rs) { ?>
                                        <tr role="row">
                                            <td align="center"><?php echo $rs->m_id; ?></td>
                                            <td><a href="<?php echo site_url('member/edit_img/'.$rs->m_id); ?>"><img src="<?php echo base_url('profile_img/'.$rs->m_img); ?>" width=100%></a>
                                            </td>

                                            <td><?php echo $rs->pname;?></td>
                                            <td><?php echo $rs->dname;?></td>
                                            <td>
                                                <?php echo $rs->m_fname.$rs->m_name.' '.$rs->m_lname; 
                                                echo '<br>';
                                                echo 'อีเมล : '.$rs->m_email;
                                                echo '<br>';
                                                echo 'เบอร์โทร : '.$rs->m_phone;
                                                ?>
                                                
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('member/pwd/'.$rs->m_id); ?>" class="btn btn-info btn-xs">
                                                    pwd
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('member/edit/'.$rs->m_id); ?>" class="btn btn-warning btn-xs">
                                                    แก้ไข
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="<?php echo  site_url('member/del/'.$rs->m_id); ?>" role="button" onclick="return confirm('ยืนยันการลบ?');"><i class="fa fa-fw fa-trash" ></i> ลบ</a>
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