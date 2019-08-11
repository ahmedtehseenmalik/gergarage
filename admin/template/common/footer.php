<?php 
require_once('./functions/config.php');
?>
  <footer class="main-footer">
     <strong>
    <?php echo $config['cms_name']; ?>
   </strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery-v1.12.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- JQueryValidation Js -->
<script src="assets/bower_components/jquery-validation/jqueryvalidate.min.js"></script>
<!-- DataTables -->
<script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.responsive.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<!-- SlimScroll -->
<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Main Js -->
<script src="assets/dist/js/main.js"></script>


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  });
   $('#example1').DataTable({
      responsive: true,
       dom: 'Bfrtip',
       buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
   });

</script>
