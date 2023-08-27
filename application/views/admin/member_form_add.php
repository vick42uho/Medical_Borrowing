<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มเพิ่มข้อมูลสมาชิก
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('admin'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  site_url('member'); ?>"> จัดการสมาชิก </a></li>
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
                        <form role="form" action="<?php echo  site_url('member/adddata2'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        ชื่อตำแหน่ง
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="ref_pid" class="form-control" required>
                                            <option value="">-เลือกข้อมูล-</option>
                                            <?php foreach ($rspo as $rs) { ?>
                                                <option value="<?php echo $rs->pid; ?>"><?php echo $rs->pname;?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="fr"><?php echo form_error('ref_pid'); ?></span>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        หน่วยงาน
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="ref_did" class="form-control" required>
                                            <option value="">-เลือกข้อมูล-</option>
                                            <?php foreach ($rsde as $rs) { ?>
                                                <option value="<?php echo $rs->did; ?>"><?php echo $rs->dname;?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="fr"><?php echo form_error('ref_did'); ?></span>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        Username
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="m_username" class="form-control" required placeholder="ภาษาอังกฤษ/ตัวเลข" value="<?php echo set_value('m_username'); ?>" minlength="4">
                                        <span class="fr"><?php echo form_error('m_username'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        Password
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" name="m_password" class="form-control" required placeholder="ภาษาอังกฤษ/ตัวเลข/ขั้นต่ำ 4 ตัว" minlength="4" value="<?php echo set_value('m_password'); ?>">
                                        <span class="fr"><?php echo form_error('m_password'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        คำนำหน้า
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="m_fname" class="form-control" required>
                                            <option value="">-เลือกข้อมูล-</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นางสาว">นางสาว</option>
                                            <option value="นาง">นาง</option>
                                        </select>
                                        <span class="fr"><?php echo form_error('m_fname'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        ชื่อ
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="m_name" class="form-control" required placeholder="ชื่อ" value="<?php echo set_value('m_name'); ?>" minlength="2">
                                        <span class="fr"><?php echo form_error('m_name'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        นามสกุล
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="m_lname" class="form-control" required placeholder="นามสกุล" value="<?php echo set_value('m_lname'); ?>" minlength="2">
                                        <span class="fr"><?php echo form_error('m_lname'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        อีเมล
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="email" name="m_email" class="form-control" required placeholder="อีเมล" value="<?php echo set_value('m_email'); ?>" minlength="5">
                                        <span class="fr"><?php echo form_error('m_email'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        เบอร์โทร
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="m_phone" class="form-control" required placeholder="เบอร์โทร" minlength="10" value="<?php echo set_value('m_phone'); ?>">
                                        <span class="fr"><?php echo form_error('m_phone'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        รูปภาพ
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="m_img" class="form-control" required accept="image/*">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-2 control-label">

                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-save"></i> บันทึก</button>
                                            <a class="btn btn-danger" href="<?php echo  site_url('member'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                </div><!-- /.box-body -->
                            </form>
                        </div>
                    </div> </div> </div>
                </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->