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
                    <b>แสดงรายงานจำนวนเอกสารแยกตามวัน</b>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    <div class="row">
                        <div class="col-sm-12">
                            <br />

                            <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row" class="info">
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 80%;">ว/ด/ป</th>
                                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;"><center>จำนวนหนังสือ</center></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $rs) { ?>
                                        <tr role="row">
                                            <td><?php echo $rs->docsave; ?></td>
                                            <td align="center"><?php echo $rs->dtotal; ?></td>
                                            
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
                    </div><!-- /.content-wrapper -->