<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มเรียกดูประวัติการยืม-คืนอุปกรณ์ตามวัน/เดือน/ปี
        </h1>
        
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <div class="login-logo">
                    <b>แสดงข้อมูลประวัติการยืม-คืนอุปกรณ์ตามช่วงเวลา</b>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap">

                    <div class="row">
                        <div class="col-sm-12">
                            <form action="<?php echo site_url('report/searchbydate_db'); ?>" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-2 control-label">
                                        เริ่มต้น
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="date" name="ds" class="form-control" required>
                                    </div>
                                    <div class="col-sm-2 control-label">
                                        สิ้นสุด
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="date" name="de" class="form-control" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-info">แสดงรายงาน</button>
                                    </div>
                                </div>
                            </form>

                            

                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
                    </div><!-- /.content-wrapper -->