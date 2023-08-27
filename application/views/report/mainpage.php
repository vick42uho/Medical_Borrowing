<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            แสดงรายงานภาพรวม
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
                    <a href="<?php echo site_url('report');?>"><b>จำนวนหนังสือที่มีทั้งหมดในระบบ</b></a>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    <div class="row">
                        <div class="col-sm-12">
                            <br />
                            <?php foreach ($query as $rs){
                                echo '<em><h2 align="center"><font color="blue"><b>';
                                echo 'มีหนังสือทั้งหมด ';
                                echo $rs->dtotal;
                                echo ' ฉบับ';
                                echo '</em></h2></b></font>';

                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
                    </div><!-- /.content-wrapper -->