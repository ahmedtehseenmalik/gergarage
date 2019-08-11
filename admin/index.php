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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
            <?php 
			// Calling functions from functions.php
			echo counttotalbooking(date("Y-m-d")); 
			?> 
			 </h3>
              <p>Today's Bookings</p>
            </div>
            <a href="bookings.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= getroaster(); ?></h3>
              <p>Today's Roaster</p>
            </div>
            <a href="roaster.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
				<?php
				echo counttotalcustomers();
				 ?>
              </h3>
              <p>Total Customers</p>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= gettotalinvoices(); ?></h3>
              <p>Total Invoice</p>
            </div>
            <a href="invoice.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?= getstockitems(); ?></h3>
              <p>Total Stock Items</p>
            </div>
            <a href="stocks.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?= countmechanics() ?></h3>
              <p>Total Mechanics</p>
            </div>
            <a href="mechanics.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Show Today's Booking -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Today's Booking</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover" width="100%">
                <thead>
                <tr>
                 <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Vehicle Name</th>
                  <th>Vehicle License</th>
                  <th>Vehicle Type</th>
                  <th>Service Name</th>                  
                  <th>Ordered Date</th>
                  <th>Status</th>
                  <th>Assign</th>
                </tr>
                </thead>
                <tbody>
                <?php
                	$resultbooking = gettodayBooking();
                	if(mysqli_num_rows($resultbooking) > 0) {
                		 while($row = mysqli_fetch_assoc($resultbooking)){ 
                		?>
                		<tr>
                  <td><?= $row['first_name'] ?></td>
                  <td><?= $row['last_name'] ?></td>
                  <td><?= $row['email'] ?></td>
                    <td><?= $row['vehicle_name'] ?></td>
                  <td><?= $row['license_no'] ?></td>
                  <td><?= $row['vehicle_type'] ?></td>
                  <td><?= $row['name'] ?></td>
                  <td><?= $row['ordered_date'] ?></td>
                  <td><?= $row['status'] ?></td>
                  <td>  <a href="assign-booking.php?bookingid=<?= $row['booking_id'] ?>" class="ft-size"> <span class=" fa fa-arrow-circle-right"></span> </a> </td>
                </tr>
                <?php }  } ?>
            </tbody>
              </table>
          </div>
    </div>
     <!-- /. Show Today's Booking -->

	<!-- Show Today's roaster -->
      
     <!-- /. Show Today's Roaster -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
// Include the Footer file
require_once('./template/common/footer.php');

?>

<style>

.ft-size{
  font-size:2.5em;
  padding-left:10px;
 
}

</style>


</body>
</html>