<?php
header("Content-Type: application/xml");
header("Content-Disposition: attachment; filename=ประวัติการส่งซ่อมอุปกรณ์.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            แสดงประวัติการส่งซ่อมอุปกรณ์ทั้งหมด
        </h1>

    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">

            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    <div class="row">
                        <div class="col-sm-12">
                            <br />
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row" class="info">
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่ส่งซ่อม</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">หน่วยงานที่ยืม</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 24%;">ชื่อ-สกุล</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">อุปกรณ์</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">จนท.เครื่องมือแพทย์</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $row) { ?>

                                        <tr role="row">
                                            <td align="center"><?php echo $row->mbr_date_lend; ?></td>
                                            <td><?php echo $row->dname; ?></td>
                                            <td><?php 
                                            echo $row->m_fname.$row->m_name.' '.$row->m_lname; 
                                            echo '<br>';
                                            echo '<font color="red"><b>เหตุผลที่ยืม : ';
                                            echo '</b></font>'.$row->mbr_reason;
                                        ?></td>
                                        <td><?php echo $row->d_name; 
                                        echo '<br>';
                                        echo '<font color="blue"><b>รหัสอุปกรณ์ : ';
                                        echo $row->d_id;
                                        echo '</b></font>';
                                        ?>
                                    </td>
                                    <td><?php echo $row->mbr_staff_name_lend; 
                                    echo '<br>';
                                    echo '<font color="warning"><b>เหตุผลที่ส่งซ่อม : ';
                                    echo '</b></font>'.$row->mbr_repair_reason;
                                ?></td>





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