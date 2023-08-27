<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        แสดงข้อมูลหนังสือ/เอกสารตามช่วงเวลา
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('report'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>

        </ol>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <div class="login-logo">
                    <b>แสดงข้อมูลหนังสือตามช่วงเวลา</b>
                </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="<?php echo site_url('report/getform'); ?>" method="post" class="form-horizontal">
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
                                <br />
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="info">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ว/ด/ป</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">เลขที่</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 46%;">ชื่อหนังสือ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">จาก</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ถึง</th>

                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">หนังสือ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $row) { ?>
                                        <tr role="row">
                                            <td align="center"><?php echo date('d-m-y',strtotime($row->doc_save)); ?></td>
                                            <td><?php echo $row->doc_num; ?></td>
                                            <td>
                                                <?php
                                                //echo '<font color="blue">';
                                                //echo '<b>';
                                                echo '<font color="blue"><b>ประเภท ';
                                                echo $row->dname;
                                                echo '</b></font>';
                                                echo br();
                                                echo $row->doc_name;
                                                echo ' ( ลว. ';
                                                echo date('d/m/y',strtotime($row->doc_date));
                                                echo ')'; ?>


                                            </td>
                                            <td><?php echo $row->doc_from; ?></td>
                                            <td><?php echo $row->doc_to; ?></td>
                                            
                                                <td>
                                                <?php $df = $row->doc_file;
                                                if ($df !='') { ?>
                                        
                                                <a href="<?php echo  base_url('docs/'.$row->doc_file); ?>" target="_blank" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;เปิดดู</a>
                                                <?php }else{
                                                    echo '<a class="btn btn-secondary"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>';
                                                } ?>

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