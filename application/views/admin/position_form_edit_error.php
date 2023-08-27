<style type="text/css">
    .fr{color: red;}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ฟอร์มแก้ไขข้อมูลตำแหน่ง
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('admin'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  site_url('position'); ?>"> จัดการตำแหน่งงาน </a></li>
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
                            <form role="form" action="<?php echo  site_url('position/editdata'); ?>" method="post" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ชื่อตำแหน่ง
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="pname" required value="<?php echo $rsedit->pname;?>">
                                            <span class="fr"><?php echo form_error('pname'); ?></span>
                                            <input type="hidden" name="pid" value="<?php echo $rsedit->pid;?>">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-save"></i> บันทึก</button>
                                            <a class="btn btn-danger" href="<?php echo  site_url('position'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                    </div><!-- /.box-body -->
                                </form>
                            </div>
                        </div> </div> </div>
                        </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->