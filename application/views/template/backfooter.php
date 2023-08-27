<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    ระบบยืม-คืนอุปกรณ์ทางการแพทย์
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2022 All rights reserved.
  </footer>
</div><!-- ./wrapper -->
</div>
</body>
</html>
<script>
  $(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'asc']],
//"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
});
  } );

</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


<script type="text/javascript">
  <?php if ($this->session->flashdata('save_success')): ?>
    swal("", "บันทึกข้อมูลเรียบร้อยแล้ว", "success");
  <?php endif; ?>

  <?php if ($this->session->flashdata('del_success')): ?>
    swal("", "ลบข้อมูลเรียบร้อยแล้ว", "success");
  <?php endif; ?>

</script>