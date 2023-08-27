<?php
header("Content-Type: application/xml");
header("Content-Disposition: attachment; filename=ประวัติการยืม-คืนอุปกรณ์.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            แสดงประวัติการยืม-คืนอุปกรณ์ทั้งหมด
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
                                        
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วันที่ยืม</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จนท.</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">หน่วยงาน</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ชื่อ-สกุล ผู้ยืม</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ประเภท</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">อุปกรณ์</th>           
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">วันที่คืน</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จนท.</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $row) { ?>
                                        <tr role="row">

                                            <td align="center">
                                                <?php 
                                                echo '<font color="Navy">';
                                                echo $row->mbr_date_lend; 
                                                echo '</font>';
                                                ?>
                                            </td>
                                            <td><?php echo '<font color="Navy">'; echo $row->mbr_staff_name_lend; echo '</font>';?></td>
                                            <td><?php echo $row->dname; ?></td>
                                            <td><?php 
                                            echo $row->m_fname.$row->m_name.' '.$row->m_lname; 
                                            echo '<br>';
                                            echo '<font color="red"><b>เหตุผลที่ยืม : ';
                                            echo '</b></font>'.$row->mbr_reason;
                                        ?></td>
                                        <td><?php echo $row->t_name;?></td>
                                        <td><?php echo $row->d_name; 
                                        echo '<br>';
                                        echo '<font color="blue"><b>รหัสอุปกรณ์ : ';
                                        echo $row->d_id;
                                        echo '</b></font>';
                                        ?>

                                    </td>


                                    



                                    <td>
                                        <?php 

                                        $dr = $row->mbr_date_return;
                                        if ($dr==NULL) {
                                            echo '<span class="label label-danger">ยังไม่ส่งคืน</span>';
                                        }else {
                                            echo '<font color="MediumVioletRed">';
                                            echo $row->mbr_date_return;
                                            echo '</font>';
                                        }

                                        ?>

                                    </td>


                                    <td><?php 
                                    echo '<font color="MediumVioletRed">'; 
                                    echo $row->mbr_staff_name_return; 
                                    echo '</font>';
                                    ?>
                                    </td>

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