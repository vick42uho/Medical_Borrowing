<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มเพิ่มบันทึกการยืม UI #3
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('staff'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  site_url('staff/devices'); ?>"> จัดการการยืม </a></li>
            <li class="active">เพิ่มข้อมูลใหม่</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Your Page Content Here -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title"> +ข่าวใหม่ </h3> -->
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="<?php echo  site_url('staff/add_lend3'); ?>" method="post" class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        บุคลากร
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="m_id" required placeholder="กรุณาพิมพ์รหัสบุคลากร" class="form-control">
                                        <span class="fr"><?php echo form_error('m_id'); ?></span>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" name="s" value="q" class="btn btn-primary">ค้นหา</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        รายละเอียดบุคลากร
                                    </div>
                                    <?php if(isset($query)){
                                        if (isset($query->m_fname)==''){
                                            echo '<font color="red">';
                                            echo 'ไม่พบข้อมูล';
                                            echo '</font>';
                                        }else{

                                         ?>
                                         <div class="col-sm-3">
                                            <b>
                                                ชื่อ-นามสกุล
                                                <?php echo $query->m_fname.$query->m_name.' '.$query->m_lname; ?><br>
                                                หน่วยงาน : <?php echo $query->dname; ?>
                                            </b>
                                        </div>
                                        <div class="col-sm-1">
                                            <img src="<?php echo base_url('profile_img/'.$query->m_img); ?>" width="100%">
                                        </div>


                                    </div>
                                </form>

                                <form role="form" action="<?php echo  site_url('staff/add_lend3_db'); ?>" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            อุปกรณ์
                                        </div>
                                        <div class="col-sm-10">
                                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                    <tr role="row" class="info">
                                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">#</th>
                                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รูปภาพ</th>
                                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ประเภท</th>
                                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 45%;">รายละเอียด</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ld as $rs) { ?>
                                                        <tr role="row">
                                                            <td align="center">
                                                                <input type="radio" name="device" value="<?php echo $rs->d_id.', '.$rs->ref_t_id; ?>" required>
                                                            </td>
                                                            <td><a href="<?php echo site_url('staff/edit_devices_img/'.$rs->no); ?>"><img src="<?php echo base_url('devices_img/'.$rs->d_img); ?>" width=100%></a>
                                                            </td>

                                                            <td><?php echo $rs->t_name;?></td>

                                                            <td>
                                                                <?php 
                                                                echo 'ลทบ.'.$rs->d_id;
                                                                echo '<br>';
                                                                echo $rs->d_name;
                                                                echo '<br>';
                                                                echo 'รายละเอียด : '.$rs->d_detail;
                                                                echo '<br>';
                                                                echo 'หมายเหตุ : '.$rs->d_remark;
                                                                ?>

                                                            </td>


                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <span class="fr"><?php echo form_error('device'); ?></span>

                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            เหตุผลการยืม
                                        </div>
                                        <div class="col-sm-4">
                                            <textarea name="mbr_reason" class="form-control" required></textarea>
                                            <span class="fr"><?php echo form_error('mbr_reason'); ?></span>
                                        </div>
                                    </div>



                                    <input type="hidden" name="ref_m_id" value="<?php echo $query->m_id; ?>">
                                    <input type="hidden" name="mbr_staff_id_lend" value="<?php echo $_SESSION['m_id']; ?>">
                                    <input type="hidden" name="mbr_staff_name_lend" value="<?php echo $_SESSION['m_name']; ?>">



                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">

                                        </div>
                                        <div class="col-sm-3">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                                <a class="btn btn-danger" href="<?php echo  site_url('staff'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>


                                            </div>
                                        </div>

                                    </div><!-- /.box-body -->
                                </form>
                                <?php 
                            } // searching

                            } // isset query
                            ?>
                        </div>
                    </div> </div> </div>
                </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->