<?php 
// Include the config file
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
	header('Location:' . $config['admin_url'] . 'login.php');
  }

 

// Include the config file
require_once('./functions/functions.php');

$booking_id=intval($_GET['bookingid']);

$booking=getBookingDetails($booking_id);

if(mysqli_num_rows($booking) > 0 ){
    while ($row = mysqli_fetch_array($booking)) { 
     
      
    
           $first_name = $row['first_name'];
           $last_name = $row['last_name'];
           $email = $row['email'] ;
           $vehicle_name = $row['vehicle_name'];
           $license_no = $row['license_no'];
           $vehicle_type = $row['vehicle_type'];
           $ordered_date = $row['ordered_date'];
           $status = $row['status'];
           $phone = $row['phone'] ;
           $username = $row['username'];
           $city = $row['city'];
           $state = $row['state'];
           $country = $row['country']; 
           $model_year = $row['model_year'];
           $booking_id = $row['booking_id'];
           $message = $row['message'];
           $name = $row['name'];
         

       }
   }

// Include the Header file
require_once('./template/common/header.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Booking Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'bookings.php' ?> ">Booking Details</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Booking Details</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <form  id="bookingform" name="bookingform">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <input type="hidden" id="booking_id" name="booking_id" value="<?= $booking_id ?>" >
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" disabled id="firstname" name="firstname" aria-describedby="firstname" placeholder="First Name" value="<?=$first_name?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" disabled id="lastname" name="lastname" aria-describedby="lastname" placeholder="Last Name" value="<?=$last_name?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" disabled id="email" name="email" aria-describedby="email" placeholder="Your Email" value="<?=$email?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="vehiclename">Vehicle Name</label>
                <input type="text" class="form-control" disabled id="vehiclename" name="vehiclename" aria-describedby="vehiclename" placeholder="Vehicle Name" value="<?=$vehicle_name?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="vehiclelicense">Vehicle License</label>
                <input type="text" class="form-control" disabled id="vehiclelicense" name="vehiclelicense" aria-describedby="vehiclelicense" placeholder="Vehicle License" value="<?=$license_no?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="vehicletype">Vehicle Type</label>
                <input type="text" class="form-control" disabled id="vehicletype" name="vehicletype" aria-describedby="vehicletype" placeholder="Vehicle Type" value="<?=$vehicle_type?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="servicename">Service Name</label>
                <input type="text" class="form-control" disabled id="servicename" name="servicename" aria-describedby="servicename" placeholder="Service Name" value="<?=$name?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="ordereddate">Ordered Date</label>
                <input type="text" class="form-control" disabled id="ordereddate" name="ordereddate" aria-describedby="ordereddate" placeholder="Ordered Date"value="<?=$ordered_date?>">
              </div>
            </div>
          </div>
        

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" disabled id="status" name="status" aria-describedby="status" placeholder="Status" value="<?=$status?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" disabled id="phone" name="phone" aria-describedby="phone" placeholder="phone"value="<?=$phone?>">
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" disabled id="username" name="username" aria-describedby="username" placeholder="username" value="<?=$username?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" disabled id="city" name="city" aria-describedby="city" placeholder="city"value="<?=$city?>">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" disabled id="state" name="state" aria-describedby="state" placeholder="state" value="<?=$state?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" disabled id="country" name="country" aria-describedby="country" placeholder="country"value="<?=$country?>">
              </div>
            </div>
          </div>

          



          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="model_year">Model Year</label>
                <input type="text" class="form-control" disabled id="model_year" name="model_year" aria-describedby="model_year" placeholder="model_year" value="<?=$model_year?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="message">Problem</label>
                <input type="text" class="form-control" disabled id="message" name="message" aria-describedby="message" placeholder="message"value="<?=$message?>">
              </div>
            </div>
          </div>

         
          
          <div class="row">
        <div class="col-md-12">
          <div id="summary" class="error"></div>
          <br/>
          <a href="bookings.php" class="btn btn-primary">Back</a>
        </div>
      </div>
        </form>
           
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