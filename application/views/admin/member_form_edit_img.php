<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มแก้ไขข้อมูลภาพประจำตัว
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
                        <form role="form" action="<?php echo  site_url('member/editdata_img'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="box-body">
                                

                            


                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        คำนำหน้า
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="m_fname" class="form-control" required disabled>
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
                                        <input type="text" name="m_name" class="form-control" required value="<?php echo $rsedit->m_name; ?>" required placeholder="ชื่อ" minlength="2" disabled>
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
                                        <input type="text" name="m_lname" class="form-control" required value="<?php echo $rsedit->m_lname; ?>" placeholder="นามสกุล" minlength="2" disabled>
                                        <input type="hidden" name="m_id" class="form-control" required value="<?php echo $rsedit->m_id; ?>">
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
                                    <div class="col-sm-2 control-label">รูปโปรไฟล์</div>
                                    <div class="col-sm-6">

                                        <br>
                                        ภาพเก่า <br>
                                        <img src="<?php echo base_url('profile_img/'.$rsedit->m_img); ?>" width="300px">
                                        <br>
                                        เลือกภาพใหม่ <br>
                                        <input type="file" name="m_img" accept="image/*" required>
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