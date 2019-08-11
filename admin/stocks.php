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
       Stocks
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'stocks.php' ?> ">Stocks</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Stocks</h3>
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
                 <th>Item Name</th>
                  <th>Item Cost</th>
                  <th>Item Quantity</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $stocks = getallstocks();
                  if(mysqli_num_rows($stocks) > 0) {
                     while($row = mysqli_fetch_assoc($stocks)){ 
                    ?>
                    <tr>
                  <td><?= $row['name'] ?></td>
                  <td><?= $row['cost'] ?></td>
                  <td><?= $row['quantity'] ?></td>
                  <td>
                    <span><a href="<?= $config['admin_url'] ?>edit-stock.php?stockid=<?= $row['stockitem_id'] ?>"><i class="fa fa-edit fa-2x"></i></a></span>  <span> <a href="<?= $config['admin_url'] ?>delete-stock.php?stockid=<?= $row['stockitem_id'] ?>"><i class="fa fa-trash fa-2x"></i></a></span>
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