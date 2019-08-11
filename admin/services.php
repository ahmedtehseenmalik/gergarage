<?php 
// Include the config file
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
	header('Location:' . $config['admin_url'] . 'login.php');
  }

// Include the config file
require_once('./functions/functions.php');

// Include the Header file
require_once('./template/common/header.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Services
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'services.php' ?> ">Services</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Services</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
           <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                 <th>Service Name</th>
                  <th>Service Cost</th>
                  <th>Service Points</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $services = getAllServices();
                  if(mysqli_num_rows($services) > 0) {
                     while($row = mysqli_fetch_assoc($services)){ 
                    ?>
                    <tr>
                  <td><?= $row['name'] ?></td>
                  <td><?= $row['cost'] ?></td>
                  <td><?= $row['points'] ?></td>
                  <td>
                    <span><a href="<?= $config['admin_url'] ?>edit-service.php?service_id=<?= $row['service_id'] ?>"><i class="fa fa-edit fa-2x"></i></a></span>  <span> <a href="<?= $config['admin_url'] ?>delete-service.php?service_id=<?= $row['service_id'] ?>"><i class="fa fa-trash fa-2x"></i></a></span>
                  </td>
                </tr>
                <?php }  } ?>
            </tbody>
              </table>
           
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


</body>
</html>