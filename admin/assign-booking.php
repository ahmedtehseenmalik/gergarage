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

$booking=getoneBooking($booking_id);
if(mysqli_num_rows($booking) > 0 ){
    while ($row = mysqli_fetch_array($booking)) { 
          
           $first_name = $row['first_name'];
           $last_name = $row['last_name'];
           $email = $row['email'] ;
           $vehicle_name = $row['vehicle_name'];
           $license_no = $row['license_no'];
           $vehicle_type = $row['vehicle_type'];
           $name = $row['name']; 
           $ordered_date = $row['ordered_date'];
           $status = $row['status'];
           $service_points=$row['points'];

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
        Assign Booking
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'index.php' ?> ">Assign Booking</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Assign Booking</h3>
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
              <input type="hidden" id="service_points" name="service_points" value="<?= $service_points ?>" >
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
						<label for="availablemechanics">Available Mechanics</label>
						<select name="availablemechanics" id="availablemechanics"  class="form-control">
                        <option value="">Select Mechanic</option>
                        <?php 
                            $mechanics=getavailableMechanics();
                            if(mysqli_num_rows($mechanics) > 0 ){
                                while ($row = mysqli_fetch_array($mechanics)) { 
                                      
                                       $employee_id = $row['employee_id'];
                                       $employee_first_name = $row['first_name'];
                                       $employee_last_name = $row['last_name'] ;
                                      ?>
                                       <option value="<?= $employee_id ?>"><?= $employee_first_name.' '.$employee_last_name  ?></option>

                                       <?php
                                   }
                               }


                               ?>
							
						</select>
					</div>
				</div>
         </div>
          
          <div class="row">
        <div class="col-md-12">
          <div id="summary" class="error"></div>
          <br/>
          <button type="submit" id="form_submit" class="btn btn-primary">Assign</button>
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








<script>
$(document).ready(function(){

	$('#form_submit').click(function(){ 
		$("#bookingform").validate({
			rules: {
				availablemechanics:{
					required: true
				}
			},
			messages:{

				
				availablemechanics:{
					required: "Mechanic Name required*"
				}
				
			},
			invalidHandler: function() {
				$( "#summary" ).text( $( "#bookingform" ).validate().numberOfInvalids() + " field(s) are invalid" );
			},
			submitHandler: function(form) {
				
				var form_data = {
                    employee_id: $('#availablemechanics').val(),
                    booking_id:  $('#booking_id').val(),
                    service_points:  $('#service_points').val(),
                    assign:1

					             	
				};
				
				$.ajax({
					url : "<?php echo $config['admin_url'] ?>ajax/assign-booking.php",
					type :"POST",
					data: form_data,
                    success: function(msg){
                       if(msg == 'done'){

                        $("#form_submit").attr("disabled", true);
                        $("#summary").html('<div class="alert alert-success"><p>Booking Assigned  !</p></div>');
                        setTimeout(function(){
                            window.location.replace("<?= $config['admin_url'] . 'index.php' ?>");
                        }, 9000);

                        }else{
                        
                        $("#summary").html('<div class="alert alert-danger"><p>Booking could not be assigned to this mechanic ! Try another mechanic !</p></div>');
                        $("#form_submit").attr("disabled", true);
                        setTimeout(function(){
                            window.location.reload(1);
                        }, 9000);
                        }
                    }
				});
				return false;
			}
		});
});

});
</script>















</body>
</html>