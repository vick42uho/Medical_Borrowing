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
          <a href="<?php echo site_url('report');?>"><b>ภาพรวมอุปกรณ์ทั้งหมดที่มีในระบบ</b></a>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

          <div class="row">
            <div class="col-sm-12">


              <!-- Small boxes (Stat box 1) -->
              <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3>
                        <?php foreach ($query as $rs){
                          echo $rs->dtotal;
                        } ?>
                        <sup style="font-size: 20px"> รายการ</sup>
                      </h3>

                      <p>อุปกรณ์ทั้งหมดที่มีในระบบ</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-medkit"></i>
                    </div>
                    <a href="<?php echo site_url('report/view_total/'); ?>" target="_blank" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>
                        <?php foreach ($query1 as $rs){
                          echo $rs->ltotal;
                        } ?>
                        <sup style="font-size: 20px"> รายการ</sup>
                      </h3>

                      <p>อุปกรณ์ทั้งหมดที่สามารถยืมได้</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-heart"></i>
                    </div>
                    <a href="<?php echo site_url('report/view_total_lend/'); ?>" target="_blank" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-purple">
                    <div class="inner">
                      <h3>
                        <?php foreach ($query2 as $rs){
                          echo $rs->btotal;
                        } ?>
                        <sup style="font-size: 20px"> รายการ</sup>
                      </h3>

                      <p>อุปกรณ์ทั้งหมดที่ถูกยืมไป</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-thermometer"></i>
                    </div>
                    <a href="<?php echo site_url('report/view_total_borrow/'); ?>" target="_blank" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>
                        <?php foreach ($query4 as $rs){
                          echo $rs->rtotal;
                        } ?>
                        <sup style="font-size: 20px"> รายการ</sup>
                      </h3>

                      <p>อุปกรณ์ที่กำลังส่งซ่อม</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-settings"></i>
                    </div>
                    <a href="<?php echo site_url('report/view_total_repair/'); ?>" target="_blank" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->



              </div>


              <!-- Small boxes (Stat box 2) -->
              <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3>
                        <?php foreach ($query3 as $rs){
                          echo $rs->damtotal;
                        } ?>
                        <sup style="font-size: 20px"> รายการ</sup>
                      </h3>

                      <p>อุปกรณ์ทั้งหมดที่ชำรุด(ตัดออกจากระบบแล้ว)</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-close"></i>
                    </div>
                    <a href="<?php echo site_url('report/view_total_damaged/'); ?>" target="_blank" class="small-box-footer">ข้อมูลเพิ่มเติม <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <!-- ./col -->
              
              </div>








            </div>






          </div>
        </div>
      </div><!-- /.box-body -->
    </div>
  </section><!-- /.content -->
                    </div><!-- /.content-wrapper -->