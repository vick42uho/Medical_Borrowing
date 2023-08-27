<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            แสดงประวัติการยืม-คืนอุปกรณ์ทั้งหมด (แยกตามตำแหน่ง)
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
                <h3 class="box-title">ตารางข้อมูล</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    <div class="row">
                        <div class="col-sm-12">
                            <br />
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row" class="info">
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่ยืม</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ชื่อ-สกุล</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ตำแหน่ง</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 30%;">อุปกรณ์</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จนท.เครื่องมือแพทย์</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วันที่คืน</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $row) { ?>
                                        <tr role="row">
                                            <td align="center"><span class="label label-success"><?php echo $row->mbr_date_lend; ?></span></td>
                                            <td><?php 
                                            echo $row->m_fname.$row->m_name.' '.$row->m_lname; 
                                            
                                        ?></td>
                                        <td><?php echo $row->pname; ?></td>
                                        <td><?php echo $row->d_name; 
                                        echo '<br>';
                                        echo '<font color="blue"><b>รหัสอุปกรณ์ : ';
                                        echo $row->d_id;
                                        echo '</b></font>';
                                        ?>
                                    </td>
                                    <td><?php echo $row->mbr_staff_name_lend; ?></td>
<!--                                             <td>
                                                    <a href="<?php // echo site_url('xx/edit/'.$data->id); ?>" class="btn btn-success btn-xs">
                                                        อนุมัติ
                                                    </a>
                                                </td> -->
                                                <td>
                                                    <?php 

                                                    $dr = $row->mbr_date_return;
                                                    if ($dr==NULL) {
                                                        echo '<span class="label label-danger">ยังไม่ส่งคืน</span>';
                                                    }else {
                                                        echo '<span class="label label-info">';
                                                        echo $row->mbr_date_return;
                                                        echo '</span>';
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