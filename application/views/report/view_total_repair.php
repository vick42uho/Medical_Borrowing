<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            อุปกรณ์ทั้งหมดที่ส่งซ่อม
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('report'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active"> อุปกรณ์ที่ส่งซ่อม </li>
        </ol>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">ตารางข้อมูล</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                   
                        <div class="col-sm-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <br />
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row" class="info">
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">รหัส</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รูปภาพ</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชื่ออุปกรณ์</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ประเภท</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 45%;">รายละเอียด</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">สถานะ</th>
 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $rs) { ?>
                                        <tr role="row">
                                            <td align="center"><?php echo $rs->no; ?></td>
                                            <td><img src="<?php echo base_url('devices_img/'.$rs->d_img); ?>" width=100%>
                                            </td>

                                            <td><?php echo $rs->d_name;?></td>
                                            <td><?php echo $rs->t_name;?></td>

                                            <td>
                                                <?php 
                                                echo 'ลทบ.'.$rs->d_id;
                                                echo '<br>';
                                                echo 'รายละเอียด : '.$rs->d_detail;
                                                echo '<br>';
                                                echo 'หมายเหตุ : '.$rs->d_remark;
                                                ?>
                                                
                                            </td>

                                            <td>
                                                <?php 
                                                
                                                $st = $rs->s_name;
                                                if ($st=='ว่าง') {
                                                    echo '<span class="label label-success">ว่าง</span>';
                                                }elseif ($st=='ถูกยืม') {
                                                    echo '<span class="label label-primary">ถูกยืม</span>';
                                                }elseif ($st=='ชำรุด') {
                                                    echo '<span class="label label-warning">ชำรุด</span>';
                                                }elseif ($st=='ส่งซ่อม') {
                                                    echo '<span class="label label-danger">ส่งซ่อม</span>';
                                                }
                                                
                                                ?>

                                            </td>


                                            
                   
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
                    </div><!-- /.content-wrapper -->