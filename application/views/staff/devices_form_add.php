<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มเพิ่มข้อมูลอุปกรณ์ทางการแพทย์
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('staff'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  site_url('staff/devices'); ?>"> จัดการอุปกรณ์ทางการแพทย์ </a></li>
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
                        <form role="form" action="<?php echo  site_url('staff/add_devices_db'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        ประเภท
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="ref_t_id" class="form-control" required>
                                            <option value="">-เลือกข้อมูล-</option>
                                            <?php foreach ($query as $rs) { ?>
                                                <option value="<?php echo $rs->t_id; ?>"><?php echo $rs->t_name;?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="fr"><?php echo form_error('ref_t_id'); ?></span>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            สถานะ
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="ref_s_id" class="form-control" required>
                                                <option value="">-เลือกข้อมูล-</option>
                                            <?php foreach ($querystatus as $rsst) { ?>
                                                <option value="<?php echo $rsst->s_id; ?>"><?php echo $rsst->s_name;?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="fr"><?php echo form_error('ref_s_id'); ?></span>

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            เลขทะเบียนอุปกรณ์
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="d_id" class="form-control" required placeholder="เลขทะเบียนอุปกรณ์" value="<?php echo set_value('d_id'); ?>" minlength="4">
                                            <span class="fr"><?php echo form_error('d_id'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ชื่ออุปกรณ์
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="d_name" class="form-control" required placeholder="ชื่ออุปกรณ์" minlength="4" value="<?php echo set_value('d_name'); ?>">
                                            <span class="fr"><?php echo form_error('d_name'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            รายละเอียด
                                        </div>
                                        <div class="col-sm-4">
                                            <textarea name="d_detail" required class="form-control"></textarea>
                                            <span class="fr"><?php echo form_error('d_detail'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            หมายเหตุ
                                        </div>
                                        <div class="col-sm-4">
                                            <textarea name="d_remark" class="form-control"></textarea>
                                           
                                        </div>
                                    </div>


                                 
                                

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        รูปภาพ
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="d_img" class="form-control" required accept="image/*">
                                    </div>
                                </div>

                                <input type="hidden" name="ref_m_id" value="<?php echo $_SESSION['m_id']; ?>">


                                <div class="form-group">
                                    <div class="col-sm-2 control-label">

                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="<?php echo  site_url('staff/devices'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                </div><!-- /.box-body -->
                            </form>
                        </div>
                    </div> </div> </div>
                </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->