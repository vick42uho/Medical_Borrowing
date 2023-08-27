<style type="text/css">
    .fr{color: red;}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ฟอร์มแก้ไขข้อมูลประเภทอุปกรณ์ทางการแพทย์
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('staff'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  site_url('staff'); ?>"> จัดการประเภทอุปกรณ์ทางการแพทย์ </a></li>
            <li class="active">แก้ไขข้อมูลใหม่</li>
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
                            <form role="form" action="<?php echo  site_url('staff/edittype_db'); ?>" method="post" class="form-horizontal">

                                <input type="hidden" name="t_id" value="<?php echo $query->t_id; ?>">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ชื่อประเภทอุปกรณ์
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="t_name" required value="<?php echo $query->t_name; ?>" placeholder="ชื่อประเภท" minlength="3">
                                            <span class="fr"><?php echo form_error('t_name'); ?></span>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="<?php echo  site_url('staff/type'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                    </div><!-- /.box-body -->
                                </form>
                            </div>
                        </div> </div> </div>
                        </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->