<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มเพิ่มบันทึกการยืม UI #1
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
                        <form role="form" action="<?php echo  site_url('staff/add_lend1_db'); ?>" method="post" class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        บุคลากร
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="ref_m_id" class="form-control" required>
                                            <option value="">เลือกข้อมูล</option>
                                            <?php foreach ($query as $rs) { ?>
                                                <option value="<?php echo $rs->m_id; ?>"><?php echo $rs->m_fname.$rs->m_name.' '.$rs->m_lname.' '.' ('.$rs->dname;?>)</option>
                                                <?php } ?>
                                            </select>
                                            <span class="fr"><?php echo form_error('ref_m_id'); ?></span>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            อุปกรณ์
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="device" class="form-control" required>
                                                <option value="">เลือกข้อมูล</option>
                                            <?php foreach ($ld as $rsd) { ?>
                                                <option value="<?php echo $rsd->d_id.', '.$rsd->ref_t_id; ?>"><?php echo $rsd->d_name;?></option>
                                                <?php } ?>
                                            </select>
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
                        </div>
                    </div> </div> </div>
                </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->