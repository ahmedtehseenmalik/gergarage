
<?php 
// Include the config file
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
	header('Location:' . $config['admin_url'] . 'login.php');
  }

 

// Include the config file
require_once('./functions/functions.php');

$employee_id=intval($_GET['mechanicid']);



// Include the Header file
require_once('./template/common/header.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delete Mechanic
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'mechanics.php' ?> ">Delete Mechanic</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Delete Mechanic</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
       

        <div id="myModal" class="modal fade" data-backdrop="static" keyboard="false">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
							
				<h4 class="modal-title">Are you sure?</h4>	
                <button type="button" class="close" id="btncross" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" id="btncancel">Cancel</button>
				<button type="button" class="btn btn-danger" id="btnconfirmed">Delete</button>
			</div>
		</div>
	</div>
</div>    
           
        </div>
    </div>
    </section>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Form Validation -->
  <?php
// Include the Footer file
require_once('./template/common/footer.php');

?>








<script>


$(window).on('load',function(){
        $('#myModal').modal('show');
    });

$(document).ready(function(){

   $('#btncancel').click(function(){
  window.location.replace("<?= $config['admin_url'] . 'mechanics.php' ?>");
   });


   $('#btncross').click(function(){
  window.location.replace("<?= $config['admin_url'] . 'mechanics.php' ?>");
   });
   
   $('#btnconfirmed').click(function(){
    window.location.replace("<?= $config['admin_url'] . 'mechanic-delete-confirmed.php?mechanicid='.$employee_id ?>");

    
   });

 

});
</script>





</body>
</html>