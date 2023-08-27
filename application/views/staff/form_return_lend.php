<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ฟอร์มการคืนอุปกรณ์
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('staff'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li><a href="<?php echo  site_url('staff/devices'); ?>"> จัดการการยืม </a></li>
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
                        <form role="form" action="<?php echo  site_url('staff/return_lend_db'); ?>" method="post" class="form-horizontal">
                            <input type="hidden" name="mbr_staff_id_return" value="<?php echo $_SESSION['m_id']; ?>">
                            <input type="hidden" name="mbr_staff_name_return" value="<?php echo $_SESSION['m_name']; ?>">
                            <input type="hidden" name="d_id" value="<?php echo $rsedit->d_id;?>">
                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    อุปกรณ์
                                </div>
                                <div class="col-sm-10">
                                    <table class="table table-bordered table-striped" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row" class="info">

                                                <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รูปภาพ</th>
                                                <th  tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ประเภท</th>
                                                <th  tabindex="0" rowspan="1" colspan="1" style="width: 45%;">รายละเอียด</th>
                                                <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">สถานะ</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr role="row">

                                                <td><a href="<?php echo site_url('staff/edit_devices_img/'.$rsedit->no); ?>"><img src="<?php echo base_url('devices_img/'.$rsedit->d_img); ?>" width=100%></a>
                                                </td>

                                                <td><?php echo $rsedit->t_name;?></td>

                                                <td>
                                                    <?php 
                                                    echo 'ลทบ.'.$rsedit->d_id;
                                                    echo '<br>';
                                                    echo $rsedit->d_name;
                                                    echo '<br>';
                                                    echo 'รายละเอียด : '.$rsedit->d_detail;
                                                    echo '<br>';
                                                    echo 'หมายเหตุ : '.$rsedit->d_remark;
                                                    echo '<br>';
                                                    echo 'ผู้ยืม : '.$rsedit->m_fname.$rsedit->m_name.' '.$rsedit->m_lname;
                                                    echo '<br>';
                                                    echo 'วันที่บันทึก : '.$rsedit->mbr_datesave;
                                                    ?>

                                                </td>


                                                <td>
                                                    <select name="ref_s_id" class="form-control" required>
                                                        <?php foreach ($querystatus as $st) 
                                                        { ?>
                                                            <option value="<?php echo $st->s_id; ?>"><?php echo $st->s_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>


                                            </tr>

                                        </tbody>
                                    </table>
                                    <span class="fr"><?php echo form_error('device'); ?></span>

                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    เหตุผลการยืม
                                </div>
                                <div class="col-sm-4">
                                    <textarea name="mbr_reason" class="form-control" disabled><?php echo $rsedit->mbr_reason; ?></textarea>
                                    <span class="fr"><?php echo form_error('mbr_reason'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label">
                                    เหตุผลการส่งซ่อม
                                </div>
                                <div class="col-sm-4">
                                    <textarea name="mbr_repair_reason" class="form-control" placeholder="เหตุผลการส่งซ่อม (เฉพาะส่งซ่อม)"><?php echo $rsedit->mbr_repair_reason; ?></textarea>
                                    <span class="fr"><?php echo form_error('mbr_repair_reason'); ?></span>
                                </div>
                            </div>




                            <input type="hidden" name="mbr_id" value="<?php echo $rsedit->mbr_id; ?>">




                            <div class="form-group">
                                <div class="col-sm-2 control-label">

                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-fw fa-save"></i> บันทึก</button>
                                        <a class="btn btn-danger" href="<?php echo  site_url('staff'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>


                                    </div>
                                </div>

                            </div><!-- /.box-body -->
                        </form>
                    </div>
                </div> </div> </div>
            </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->