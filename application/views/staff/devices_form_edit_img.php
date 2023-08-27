<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มแก้ไขข้อมูลภาพอุปกรณ์
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('staff'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  site_url('staff'); ?>"> จัดการอุปกรณ์ </a></li>
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
                        <form role="form" action="<?php echo  site_url('staff/edit_devices_img_db'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="box-body">



                                <div class="form-group">
                                    <div class="col-sm-2 control-label">รูปภาพอุปกรณ์</div>
                                    <div class="col-sm-6">
                                        <input type="hidden" name="no" class="form-control" required value="<?php echo $rsedit->no; ?>">
                                        <br>
                                        ภาพเก่า <br>
                                        <img src="<?php echo base_url('devices_img/'.$rsedit->d_img); ?>" width="300px">
                                        <br>
                                        เลือกภาพใหม่ <br>
                                        <input type="file" name="d_img" accept="image/*" required>
                                    </div>

                                </div>


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