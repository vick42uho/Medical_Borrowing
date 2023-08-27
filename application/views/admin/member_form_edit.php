<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มแก้ไขข้อมูลสมาชิก
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
                        <form role="form" action="<?php echo  site_url('member/editdata'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        ชื่อตำแหน่ง
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="ref_pid" class="form-control">
                                            <option value="<?php echo $rsedit->ref_pid; ?>">
                                                <?php echo $rsedit->pname; ?>
                                            </option>
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
                                        ชื่อหน่วยงาน
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="ref_did" class="form-control">
                                            <option value="<?php echo $rsedit->ref_did; ?>">
                                                <?php echo $rsedit->dname; ?>
                                            </option>
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
                                        <input type="text" name="m_username" class="form-control" required value="<?php echo $rsedit->m_username; ?>" Disabled>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        คำนำหน้า
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="m_fname" class="form-control" required>
                                            <option value="<?php echo $rsedit->m_fname; ?>"><?php echo $rsedit->m_fname; ?></option>
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
                                        <input type="text" name="m_name" class="form-control" required value="<?php echo $rsedit->m_name; ?>" required placeholder="ชื่อ" minlength="2">
                                        <?php  if (form_error('m_name')=='') {
                                            
                                        }else{  ?>
                                        <span class="fr">
                                        คุณได้พิมพ์ :
                                        <?php echo set_value('m_name'); ?>
                                        <br>
                                        ข้อผิดพลาด :
                                        <?php echo form_error('m_name'); ?>
                                    <?php } ?>
                                    </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        นามสกุล
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="m_lname" class="form-control" required value="<?php echo $rsedit->m_lname; ?>" placeholder="นามสกุล" minlength="2">
                                        <?php  if (form_error('m_lname')=='') {
                                            
                                        }else{  ?>
                                    <span class="fr">
                                        คุณได้พิมพ์ :
                                        <?php echo set_value('m_lname'); ?>
                                        <br>
                                        ข้อผิดพลาด :
                                        <?php echo form_error('m_lname'); ?>
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        อีเมล
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="email" name="m_email" class="form-control" required value="<?php echo $rsedit->m_email; ?>">
                                        <?php  if (form_error('m_email')=='') {
                                            
                                        }else{  ?>
                                        <span class="fr">
                                        คุณได้พิมพ์ :
                                        <?php echo set_value('m_email'); ?>
                                        <br>
                                        ข้อผิดพลาด :
                                        <?php echo form_error('m_email'); ?>
                                        <?php } ?>
                                    </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        เบอร์โทร
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="m_phone" class="form-control" required value="<?php echo $rsedit->m_phone; ?>" placeholder="เบอร์โทร" minlength="10">
                                        <?php  if (form_error('m_phone')=='') {
                                            
                                        }else{  ?>
                                        <span class="fr">
                                        คุณได้พิมพ์ :
                                        <?php echo set_value('m_phone'); ?>
                                        <br>
                                        ข้อผิดพลาด :
                                        <?php echo form_error('m_phone'); ?>
                                        <?php } ?>
                                    </span>

                                        <input type="hidden" name="m_id" class="form-control" required value="<?php echo $rsedit->m_id; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 control-label">รูปโปรไฟล์</div>
                                    <div class="col-sm-6">

                                        <br>
                                        ภาพเก่า <br>
                                        <img src="<?php echo base_url('profile_img/'.$rsedit->m_img); ?>" width="300px">
                                        <br>
                                        เลือกภาพใหม่ <br>
                                        <input type="file" name="m_img" accept="image/*">
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