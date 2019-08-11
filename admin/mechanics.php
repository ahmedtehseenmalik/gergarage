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
       Mechanics
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'mechanics.php' ?> ">Mechanics</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Mechanics</h3>
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
                 <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Username</th>
                  <th>Street</th>
                  <th>Postal Code</th>                  
                  <th>State</th>
                  <th>City</th>
                  <th>Country</th>
                  <th>Actions</th>
    

                </tr>
                </thead>
                <tbody>
                <?php
                  $mechanics = getallmechanics();
                  if(mysqli_num_rows($mechanics) > 0) {
                     while($row = mysqli_fetch_assoc($mechanics)){ 
                    ?>
                    <tr>
                  <td><?= $row['first_name'] ?></td>
                  <td><?= $row['last_name'] ?></td>
                  <td><?= $row['email'] ?></td>
                  <td><?= $row['phone'] ?></td>
                  <td><?= $row['username'] ?></td>
                  <td><?= $row['street'] ?></td>
                  <td><?= $row['postal_code'] ?></td>
                  <td><?= $row['state'] ?></td>
                  <td><?= $row['city'] ?></td>
                  <td><?= $row['country'] ?></td>
                  <td>
                    <span><a href="<?= $config['admin_url'] ?>edit-mechanics.php?mechanicid=<?= $row['employee_id'] ?>"><i class="fa fa-edit fa-2x"></i></a></span>  <span> <a href="<?= $config['admin_url'] ?>delete-mechanic.php?mechanicid=<?=  $row['employee_id'] ?>"><i class="fa fa-trash fa-2x"></i></a></span>
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