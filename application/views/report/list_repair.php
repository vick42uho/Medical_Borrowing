<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            แสดงประวัติการส่งซ่อมอุปกรณ์
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('report'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
            <li class="active"> จัดการอุปกรณ์การแพทย์ </li>
        </ol>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <!--                 <h3 class="box-title">ตารางข้อมูล</h3> -->
                <br />
                <a href="<?php echo site_url('report/list_repair_excel'); ?>" class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true"></i>  Export to Excel</a>
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
                                        <!--   <th  tabindex="0" rowspan="1" colspan="1" style="width: 12%;">วันที่ซ่อมเสร็จ</th> -->

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

<!--                                                 <td align="center"><span class="label label-info"><?php // echo $row->mbr_date_return; ?></span>
</td> -->




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